#include <stdio.h>

int menu() {
	int a;
	printf("1 - Inserir Valores\n");
	printf("2 - Mostrar Valores\n");
	printf("3 - Ordenar Valores (Crescente)\n");
	printf("4 - Ordenar Valores (Decrescente)\n");
	printf("0 - Sair\n");
	printf("Qual a sua opção? ");
	scanf("%d",&a);

	return a;
}

void inserirValor(int *v, int n) {
	for (int i=0; i<n; i++)  //o operador lógico de <,>, = vai depender do numero do n, pois inicia o i em zero e vai crescendo atC) o n.
	{
		printf("v[%d]=",i);
		scanf("%d",&v[i]);
	}
}

void mostrarValor(int *v, int n) {

	printf("Os valores inseridos foram: \n");
	for(int i=0; i<n; i++)
	{
		printf("v[%d]=%d\n",i,v[i]);
	}
}

void ordenarVetorCresce(int *vetor, int n)
{
    int temp;    
    for (int i = 0; i < n - 1; i++)
        {
        for (int j = 0; j < n - 1 - i; j++)
            {
                if (vetor[j] > vetor[j + 1]) // > do maior para menor
                {
         // Troca os elementos
                 temp = vetor[j];
                 vetor[j] = vetor[j + 1];
                 vetor[j + 1] = temp;
                }
            }  
        }
    
}

void ordenarVetorDecresce(int *vetor, int n)
{
    int temp;    
    for (int i = 0; i < n - 1; i++)
        {
        for (int j = 0; j < n - 1 - i; j++)
            {
                if (vetor[j] < vetor[j + 1]) // < do menor para menor
                {
         // Troca os elementos
                 temp = vetor[j];
                 vetor[j] = vetor[j + 1];
                 vetor[j + 1] = temp;
                }
            }  
        }
    
}

int main()
{
	int n, a, inserido=0;
	printf("Qual o tamanho do vetor: ");
	scanf("%d",&n);
	int v[n];
	do {
		a = menu();
		switch(a) {
		case 1:
			inserirValor(v,n);
			inserido=1;
			break;
		case 2:
			if (inserido)
				mostrarValor(v,n);
			else
				printf("Há que insirir os valores primeiro...");
			break;
		case 3:
			if (inserido)
				ordenarVetorCresce(v,n);
			else
				printf("Há que insirir os valores primeiro...");
			break;
		case 4:
		    if (inserido)
				ordenarVetorDecresce(v,n);
			else
				printf("Há que insirir os valores primeiro...");
			break;
		case 0:
    		    printf("Opção de saída selecionada.\n");
    		    printf("Terminando o programa.");
		    break;
		    
		default:
		    printf("Opção inválida.");
		    break;
		}

	} while(a!=0);
	return 0;
}
