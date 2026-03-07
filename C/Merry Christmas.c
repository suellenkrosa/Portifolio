#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define RESET "\033[0m"
#define GREEN "\033[32m"
#define RED "\033[31m"
#define BROWN "\033[33m"
#define YELLOW "\033[33m"

int main()
{
    int i, j;
    int linhas = 8;

    srand(time(NULL));
    printf("Merry Christmas\n\n");

    // CORREÇÃO: i++ para incrementar corretamente
    for (i=1; i <= linhas; i++) { 
        for (j=1; j <= linhas - i; j++) {
            printf(" ");
        }

        for (j=1; j <= (2*i-1); j++) {
            int prob = rand() % 8;

            if (prob == 0) {
                printf(RED "o" RESET);
            }
            else if (prob == 1) {
                printf(YELLOW "o" RESET);
            } else {
                printf(GREEN "*" RESET);
            }
        }    
        printf("\n");
    }

    // O tronco da árvore
    for (i = 1; i < 4; i++) {
        for (j=0; j <= linhas - 3; j++) {
            printf(" ");
        }
        printf(BROWN "| |" RESET "\n");
    }

    return 0;
}
