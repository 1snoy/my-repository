from click import types
from aiogram import Bot, Dispatcher, executor, types
from aiogram.dispatcher import FSMContext
from aiogram.dispatcher.filters.state import State, StatesGroup
from aiogram.contrib.fsm_storage.memory import MemoryStorage
import buttons as btn
import db.sql_utils as db_conn
from users import UserForm
db = db_conn.db
bot = Bot('5237205358:AAF0oZXokaMrPy8bvBl1wxPG2_uEe55vIR4')
dp = Dispatcher(bot,storage=MemoryStorage())


@dp.message_handler(commands=['start'])
async def main_menu(call: types.Message):
    if db.get_user(call.from_user.id):
        await call.reply('Выберите действие: ', reply_markup=btn.main_menu())
    else:
        await UserForm.name.set()
        await bot.send_message(call.from_user.id,"Введите свое имя")
async def process_name(call: types.Message, state: FSMContext):
    async with state.proxy() as data:
        data['name'] = call.text
    await UserForm.next()
    await bot.send_message(call.from_user.id,"Введите свой номер")
async def process_phone_number(call: types.Message, state: FSMContext):
    async with state.proxy() as data:
        data['number'] = call.text
    await UserForm.next()
    await bot.send_message(call.from_user.id,"Введите локацию")

async def process_location(call: types.Message, state: FSMContext):
    if call.location:
        async with state.proxy() as data:
            data['location'] = "1"
        await state.finish()
        await call.reply('Данные записаны')
        for item in data:
            print(data[item])
    else:
        await call.reply('Иди нахуй !')

    
@dp.message_handler()
async def echo(call: types.Message):
    await call.reply(call.text)


async def event_buttons(call: types.CallbackQuery):
    if call.data == 'category':
        await bot.send_message(call.from_user.id, 'Категория: ', reply_markup=btn.category_menu())
        await bot.delete_message(call.from_user.id, call.message.message_id)
        await bot.answer_callback_query(call.id)
    if call.data == 'back_category':
        await bot.send_message(call.from_user.id, 'Выберите действие: ', reply_markup=btn.main_menu())
        await bot.delete_message(call.from_user.id, call.message.message_id)
        await bot.answer_callback_query(call.id)


async def show_products(call: types.CallbackQuery):
    category_id = call.data.replace('category', '')
    print(category_id)
    products = db.show_products(category_id)
    await call.answer('Some text', btn.products_buttons(products))
    await bot.answer_callback_query(call.id)


def register_handler_registration():
    dp.register_message_handler(process_name,state=UserForm.name)
    dp.register_message_handler(process_phone_number,state=UserForm.number)
    dp.register_message_handler(process_location,content_types=["location"],state=UserForm.location)
    dp.register_message_handler(main_menu, commands='start')
    dp.register_callback_query_handler(
        event_buttons, lambda call: call.data == 'category' or call.data == 'back_category')
    dp.register_callback_query_handler(show_products,lambda call: call.data == 'all_products')
    dp.register_callback_query_handler(
        show_products, lambda call: call.data.startswith('category'))


if __name__ == '__main__':
    register_handler_registration()
    executor.start_polling(dp)
