#include <stdio.h>

int main()
{
    int a;
    float b, c, resultado; // Usei apenas 'resultado' para simplificar

    do {
        printf("\n=====================\n");
        printf("      Calculadora    \n");
        printf("=====================\n");
        printf("=   1 - Somar       =\n");
        printf("=   2 - Subtrair    =\n");
        printf("=   3 - Multiplicar =\n");
        printf("=   4 - Dividir     =\n");
        printf("=   0 - Sair        =\n");
        printf("=====================\n");

        printf("Por favor, insira a operacao desejada: ");
        scanf("%d", &a);

        if (a >= 1 && a <= 4) {
            printf("Insira o primeiro valor: ");
            scanf("%f", &b);
            printf("Insira o segundo valor: ");
            scanf("%f", &c);
        }

        switch(a) {
            case 1:
                resultado = b + c;
                printf("A soma e: %.2f\n", resultado);
                break;
            case 2:
                resultado = b - c;
                printf("A diferenca e: %.2f\n", resultado);
                break;
            case 3:
                resultado = b * c;
                printf("O produto e: %.2f\n", resultado);
                break;
            case 4:
                if (c == 0) {
                    printf("Erro: Nao e possivel dividir por zero.\n");
                } else {
                    resultado = b / c;
                    printf("O quociente e: %.2f\n", resultado);
                }
                break;
            case 0:
                printf("Ate a proxima!\n");
                break;
            default:
                printf("Opcao invalida\n");
        }
    } while(a != 0);

    return 0;
}
