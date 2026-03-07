print("Bem-vindo à Escolha do Caminho!")

while True:
    caminhoA = input("Você deseja escolher o caminho A? (Sim/Não) ")

    if caminhoA == "Sim":
        print("Acabou o jogo!")
        break
    else:
        caminhoB = input("Você deseja escolher o caminho B? (Sim/Não) ")

    if caminhoB == "Sim":
        print("Acabou o jogo!")
        break
    else:
        caminhoC = input("Você deseja escolher o caminho C? (Sim/Não) ")
        if caminhoB == "Não":
            print("Parabéns! Você encontrou o caminho :)")
            break
        else:
            print("Reinicie o jogo.")
