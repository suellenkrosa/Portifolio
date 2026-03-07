import math

print("Bem-vindo à Calculadora de Triângulos")


def calculadora():
    while True:
        escolha = input("Você deseja calcular a área ou os ângulos do triângulo? (área/ângulos) ")

        if escolha == "área":
            tipo = input("Tipo de triângulo (equilátero/isósceles/escaleno): ")

            if tipo == "equilátero":
                lado = float(input("Informe o comprimento do lado: "))
                area = (lado ** 2 * math.sqrt(3)) / 4
                print(f"A área do triângulo equilátero é: {area}")

            elif tipo == "isósceles":
                base = float(input("Informe a base: "))
                altura = float(input("Informe a altura: "))
                area = (base * altura) / 2
                print(f"A área do triângulo isósceles é: {area}")

            elif tipo == "escaleno":
                base = float(input("Informe o comprimento da base: "))
                altura = float(input("Informe a altura: "))
                area = (base * altura) / 2
                print(f"A área do triângulo escaleno é: {area}")

            else:
                print("Tipo de triângulo inválido!")

        elif escolha == "ângulos":
            tipo = input("Tipo de triângulo (equilátero/isósceles/escaleno): ")
            if tipo == "equilátero":
                print("Em um triângulo equilátero, todos os ângulos são 60°.")

            elif tipo == "isósceles":
                base = float(input("Informe a base: "))
                lados_iguais = float(input("Informe o comprimento dos lados iguais: "))
                ang_base = math.degrees(math.acos((2 * lados_iguais ** 2 - base ** 2) / (2 * lados_iguais ** 2)))
                ang_apice = 180 - 2 * ang_base
                print(f"Os ângulos internos são: {ang_base}°, {ang_base}°, {ang_apice}°")

            elif tipo == "escaleno":
                a = float(input("Informe o comprimento do lado a: "))
                b = float(input("Informe o comprimento do lado b: "))
                c = float(input("Informe o comprimento do lado c: "))
                ang_A = math.degrees(math.acos((b ** 2 + c ** 2 - a ** 2) / (2 * b * c)))
                ang_B = math.degrees(math.acos((a ** 2 + c ** 2 - b ** 2) / (2 * a * c)))
                ang_C = 180 - ang_A - ang_B
                print(f"Os ângulos internos são: {ang_A}°, {ang_B}°, {ang_C}°")

            else:
                print("Tipo de triângulo inválido!")

        else:
            print("Opção inválida. Tente novamente.")

        continuar = input("Deseja realizar outro cálculo? (sim/não): ")
        if continuar == "não":
            print("Obrigado por usar a Calculadora de Triângulos! Até logo!")
            break

calculadora()