import random

print("Bem-vindo ao 'Find the Code'. Encontre o número correto, que foi gerado, para desbloquear o cadeado.")

numeroAleatorio = random.randint(1, 100)
tentativas = 0

max_tentativas = 10

while tentativas < max_tentativas:
    tentativa = int(input(f"Tentativa {tentativas + 1} de {max_tentativas}: Insira um número de 1 a 100: "))
    tentativas += 1

    if tentativa == numeroAleatorio:
        print(f"Parabéns, cadeado desbloqueado na {tentativas}ª tentativa!")
        break

    elif abs(tentativa - numeroAleatorio) <= 5:
        print("Dica: Quente! O número está muito perto!")

    elif tentativa < numeroAleatorio:
        print("Dica: O número é maior. Tente novamente!")
    elif tentativa > numeroAleatorio:
        print("Dica: O número é menor. Tente novamente!")

if tentativa != numeroAleatorio:
    print(f"Que pena! O número correto era {numeroAleatorio}. Você não conseguiu desbloquear o cadeado.")








