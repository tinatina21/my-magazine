from aiogram import Bot, Dispatcher, types
from aiogram.types import ParseMode
from aiogram.contrib.middlewares.logging import LoggingMiddleware
from aiogram.utils import executor
from datetime import datetime
import os

API_TOKEN = 'токен бота'

bot = Bot(token=API_TOKEN)
dp = Dispatcher(bot)
dp.middleware.setup(LoggingMiddleware())

user_data = {}

@dp.message_handler(commands=['start'])
async def send_welcome(message: types.Message):
    await message.reply("Здравстуйте! Пожалуйста, укажите ваше имя:")

@dp.message_handler(lambda message: not user_data.get(message.from_user.id, {}).get('name'))
async def get_name(message: types.Message):
    user_data.setdefault(message.from_user.id, {})['name'] = message.text.strip()
    await message.reply("Теперь укажите вашу электронную почту указанную при регистрации на сайте:")

@dp.message_handler(lambda message: not user_data.get(message.from_user.id, {}).get('email'))
async def get_email(message: types.Message):
    email = message.text.strip()
    if "@" in email and "." in email:
        user_data[message.from_user.id]['email'] = email
        await send_order_info(message)
    else:
        await message.reply("Пожалуйста, укажите правильный адрес электронной почты:")

async def send_order_info(message: types.Message):
    user_info = user_data.get(message.from_user.id)
    if user_info and 'name' in user_info and 'email' in user_info:
        now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        response = (f"Дата и время заказа: {now}\n"
                    f"Имя пользователя: {user_info['name']}\n"
                    f"Электронная почта: {user_info['email']}\n"
                    "Статус заказа: Собирается на складе")
        await message.reply(response, parse_mode=ParseMode.HTML)
    else:
        await message.reply("Заказ не найден")

if __name__ == '__main__':
    executor.start_polling(dp, skip_updates=True)
