import time
import os

# ------------------------------------------------------------
# Conversor de Temperaturas v2 (com histórico, estatísticas e extras)
# Formanda: Suellen Kretzschmar Rosa
# Data: 15/11/2025
# ------------------------------------------------------------

def clear_console(): #Limpar a tela do terminal
    if os.name == "nt":  # Windows
        os.system("cls")
    else:  # Outros (Linux, Mac)
        os.system("clear")

def converter_temperatura(opcao, valor):  #Converte a temperatura segundo a opção
    if opcao == 1:
        return (valor * 9/5) + 32, "Celsius", "Fahrenheit"
    elif opcao == 2:
        return valor + 273.15, "Celsius", "Kelvin"
    elif opcao == 3:
        return (valor - 32) * 5/9, "Fahrenheit", "Celsius"
    elif opcao == 4:
        return (valor - 32) * 5/9 + 273.15, "Fahrenheit", "Kelvin"
    elif opcao == 5:
        return (valor - 273.15) * 9/5 + 32, "Kelvin", "Fahrenheit"
    elif opcao == 6:
        return valor - 273.15, "Kelvin", "Celsius"
    else:
        return None, None, None

def mostrar_menu(): #Imprime o menu principal para o usuário.
    print("\n--- Conversor de Temperaturas para viagens ✈️ ---")
    print("1 – Nova conversão de temperatura")
    print("2 – Ver histórico de conversões")
    print("3 – Ver estatísticas das temperaturas convertidas")
    print("4 – Limpar histórico")
    print("5 – Filtrar histórico por escala")
    print("0 – Sair")

def obter_opcao(): #Lê a opção do usuário e altera para inteiro.
    try:
        opc = int(input("Digite a opção desejada: "))
    except ValueError:
        return -1
    return opc

def nova_conversao(historico, contador_conversoes):#Faz uma nova conversão,
#guarda no histórico e conta para mensagens especiais.
    print("\nOpções de conversão:")
    print("1 - Converter Celsius para Fahrenheit")
    print("2 - Converter Celsius para Kelvin")
    print("3 - Converter Fahrenheit para Celsius")
    print("4 - Converter Fahrenheit para Kelvin")
    print("5 - Converter Kelvin para Fahrenheit")
    print("6 - Converter Kelvin para Celsius\n")

    opcao = int(input("Escolha a escala (1 a 6): "))
    if opcao < 1 or opcao > 6:
        print("Atenção! Opção de conversão inválida!")
        return contador_conversoes

    valor = float(input("Digite a temperatura a converter: "))
    resultado, escala_in, escala_out = converter_temperatura(opcao, valor)
    historico.append((valor, escala_in, resultado, escala_out))

    print(f"{valor:.2f}°{escala_in} -> {resultado:.2f}°{escala_out}")

    contador_conversoes += 1 #Mensagem especial após algumas conversões.
    
    if contador_conversoes == 5:
        print("Uau! Você já fez 5 conversões!")
    elif contador_conversoes == 10:
        print("10 conversões já! Arrasou!")

    return contador_conversoes

def ver_historico(historico): #Mostra todo o histórico de conversões.
    if not historico:
        print("\nHistórico vazio.")
        return
    print("\n--- Histórico de Conversões ---")
    for i, (valor, esc_in, res, esc_out) in enumerate(historico, 1):
        print(f"{i}: {valor:.2f}°{esc_in} -> {res:.2f}°{esc_out}")

def estatisticas(historico):
    if not historico:
        print("\nNão há dados para estatísticas.")
        return

    valores_convertidos = [registro[2] for registro in historico]
    minimo = min(valores_convertidos)
    maximo = max(valores_convertidos)
    media = sum(valores_convertidos) / len(valores_convertidos)

    print("\n--- Estatísticas ---")
    print(f"Menor: {minimo:.2f}")
    print(f"Maior: {maximo:.2f}")
    print(f"Média: {media:.2f}")

def limpar_historico(historico):#Limpa todo o histórico com confirmação.
    if not historico:
        print("\nHistórico já está vazio.")
        return
    confirmar = input("Tem certeza que quer apagar todo o histórico? (s/n): ")
    if confirmar.lower() == 's':
        historico.clear()
        print("Histórico apagado com sucesso.")
    else:
        print("Ação cancelada — histórico mantido.")

def filtrar_historico(historico):#Permite filtrar o histórico por escala de origem ou destino.
    if not historico:
        print("\nNão há nada pra filtrar no histórico.")
        return

    print("\nFiltrar por:")
    print("1 – Escala de origem")
    print("2 – Escala de destino")
    escolha = int(input("Digite 1 ou 2: "))
    if escolha not in (1, 2):
        print("Opção inválida para filtro.")
        return

    escala = input("Digite a escala (Celsius, Fahrenheit ou Kelvin): ").strip().capitalize()

    registros_filtrados = []
    for valor, esc_in, res, esc_out in historico:
        if escolha == 1 and esc_in == escala:
            registros_filtrados.append((valor, esc_in, res, esc_out))
        elif escolha == 2 and esc_out == escala:
            registros_filtrados.append((valor, esc_in, res, esc_out))

    if not registros_filtrados:
        print(f"\nNenhuma conversão encontrada para escala {escala}.")
    else:
        print(f"\n--- Histórico filtrado para escala {escala} ---")
        for i, (valor, esc_in, res, esc_out) in enumerate(registros_filtrados, 1):
            print(f"{i}: {valor:.2f}°{esc_in} → {res:.2f}°{esc_out}")

def contagem_regressiva_voo(segundos=5): #Mostra uma contagem regressiva
    for i in range(segundos, 0, -1):
        print(f"Saindo em {i}... ✈️", end="\r", flush=True)
        time.sleep(1)
    print("\n✈️ Até logo! Boa viagem! ✈️   ")

def main():
    historico = []
    contador_conversoes = 0

    while True:
        mostrar_menu()
        opc = obter_opcao()

        if opc == 0:
            contagem_regressiva_voo(5)
            break
        elif opc == 1:
            contador_conversoes = nova_conversao(historico, contador_conversoes)
        elif opc == 2:
            ver_historico(historico)
        elif opc == 3:
            estatisticas(historico)
        elif opc == 4:
            limpar_historico(historico)
        elif opc == 5:
            filtrar_historico(historico)
        else:
            print("Desculpe, opção inválida, tente novamente.")

if __name__ == "__main__":
    main()
