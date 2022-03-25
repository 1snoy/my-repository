from aiogram.types import InlineKeyboardButton, InlineKeyboardMarkup, KeyboardButton, ReplyKeyboardMarkup
import db.sql_utils as db_conn
db = db_conn.db


def main_menu():
    btn_ctg = InlineKeyboardButton(text='Категории', callback_data='category')
    btn_cart = InlineKeyboardButton(text='Корзина', callback_data='cart')
    markup_menu = InlineKeyboardMarkup()
    markup_menu.row(btn_ctg, btn_cart)
    return markup_menu


def category_menu():
    markup_categ = InlineKeyboardMarkup(row_width=2)
    for category in db.show_categories():
        btn_category = InlineKeyboardButton(text=category[1],
                                            callback_data='category' + str(category[0]))
        markup_categ.insert(btn_category)

    markup_categ.add(InlineKeyboardButton(
        'Назад', callback_data='back_category'))
    return markup_categ


def products_buttons(products):
    keyboard = ReplyKeyboardMarkup()
    for product in products:
        key = KeyboardButton(product[2])
        keyboard.add(key)
    return keyboard
