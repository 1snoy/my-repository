from aiogram.dispatcher.filters.state import State, StatesGroup

class UserForm(StatesGroup):
    name = State()
    number = State()
    location = State()