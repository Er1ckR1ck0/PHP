"""
Комментарии здесь описывают ход моей работы, что я хотел сделать и зачем.
Виртуальные простратсва не нужно запускать, так как с помощью Python я создам основу для работы над Заданием №1

Для начала работы, нам необходимо создать виртуально пространство командой: python -m venv {any_venv_name}
Активируем VENV: venv\Scripts\activate
После необходимо установить библиотеку g4f: pip install g4f
"""

import g4f # Используем библиотеку для генерации статей

instruction = """
Твоя задача придумать aнoнс к любой нововсти, которую ты можешь придумать. Тебе нужно отвечать на русском больше 250 но меньше 500 символов. Не добавляй объяснения и ссылки на статью.
"""
def ask_gpt(instruction: str, integer: int) -> str:
    responce = g4f.ChatCompletion.create(
        model=g4f.models.gpt_35_turbo_16k_0613,
        messages=[{'role': 'user', 'content': instruction}],
    )
    print(responce)
    with open('article.txt', 'a') as file:
        print(responce + "\n", file=file)
    print(str(f"done with {integer} article"))

# for i in range(0,30):
#     ask_gpt(instruction, i)
# file.close()

count = 0
with open("article.txt", "r") as file:
    for line in file: 
        if line == '\n':
            print(type(line))
            continue
        else: count+=1
print(count)

with open("article.txt", "r") as f:
    lines = f.readlines()
with open("article.txt", "w") as f:
    for line in lines:
        if line.strip("\n"):
            f.write(line)
