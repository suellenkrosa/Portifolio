print("Bem-vindo ao Mystery Island! Aqui, você é um desbravador em busca do tesouro perdido!")

def jogo():
    while True:
        inicio = input("Você deseja entrar no jogo? (Sim/Não) ")

        if inicio != "Sim":
            print("Fechando o programa.")
            break
        else:
            print("\nVocê começa sua jornada na ilha misteriosa.")

            caminho1 = input("Você está à beira de uma floresta densa. Deseja entrar na floresta? (Sim/Não) ")

            if caminho1 == "Sim":
                caminho2 = input("Você se perde na floresta e encontra uma caverna misteriosa. Deseja entrar na caverna? (Sim/Não) ")

                if caminho2 == "Sim":
                    print("\nVocê entra na caverna e encontra um monstro guardando o tesouro!")
                    batalha = input("Deseja lutar com o monstro? (Sim/Não) ")

                    if batalha == "Sim":
                        print("\nVocê derrota o monstro e encontra o tesouro perdido!")
                        print("Parabéns, você ganhou o jogo!")
                        break
                    else:
                        print("\nVocê foge da caverna, mas acaba se perdendo na floresta.")
                        print("Você perdeu. Tente novamente!")
                        break
                else:
                    print("\nVocê decide não entrar na caverna e retorna para a floresta.")
                    print("Infelizmente, você se perde e nunca encontra o tesouro.")
                    print("Você perdeu. Tente novamente!")
                    break

            else:
                print("\nVocê decide não entrar na floresta e volta para a praia.")
                print("O tesouro perdido ainda está à espera de um corajoso aventureiro!")
                print("Você perdeu. Tente novamente!")
                break

jogo()