import random

print("Bem-vindo ao Tabuadex!\nResponde correctamente as multiplicações, ganhe pontos e pratique a tabuada!")

pontos = 0
print("Seus pontos atuais são: ", pontos)

while True:
    numeroAleatorio = random.randint(1, 10)
    multiplicacao = random.randint(1, 10)
    resposta_correta = numeroAleatorio * multiplicacao

    resposta_usuario = int(input(f"{numeroAleatorio} X {multiplicacao} = ? Insira sua resposta: "))

    if resposta_usuario == resposta_correta:
        pontos += 5
        print(f"Parabéns, o resultado está correcto! Sua pontuação é: {pontos}")
    else:
        print(f"Incorrecto, a resposta correcta era {resposta_correta}. Tente novamente.")


    continuar = input("Deseja continuar a jogar? (s/n): ").lower()
    if continuar != 's':
        print(f"Jogo encerrado. Sua pontuação final é: {pontos}")
        break
