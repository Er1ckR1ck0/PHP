import g4f # Используем библиотеку для генерации статей

def ask_gpt(instructions: str, integer: int) -> str:
    responce = g4f.ChatCompletion.create(
        model=g4f.models.gpt_35_turbo_0613,
        messages=[{'role': 'user', 'content': instructions}],
    )
    print(responce)
while True:
    try:
        print(ask_gpt(input("> Введи запрос "), 2))
    except (RuntimeError, ConnectionError):
        print(ask_gpt(input("> Введи запрос "), 2))