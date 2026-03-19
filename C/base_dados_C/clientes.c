#include <stdio.h>
#include <string.h>
#include "clientes.h"
#include "utils.h"

void preencheDados(Clientes lista[], int *n) {
    int i = *n; 
    int idTemporario, existe, j;

    do {
        existe = 0; // Reset da verificação
        printf("ID: ");
        scanf("%d", &idTemporario);
        getchar(); // Limpa o buffer

        // Percorre a lista que já temos na memória para comparar
        for (j = 0; j < *n; j++) {
            if (lista[j].id == idTemporario) {
                printf(RED "Erro: Este ID já está registado! Tente outro.\n" RESET);
                existe = 1;
                break; // Para o for, pois já encontrou o duplicado
            }
        }
    } while (existe == 1); // Repete enquanto o ID for repetido

    // Se saiu do loop, o ID é válido. Agora guardamos na struct:
    lista[i].id = idTemporario;

    printf("Nome: ");
    fgets(lista[i].nome, 30, stdin);
    lista[i].nome[strcspn(lista[i].nome, "\n")] = 0;

    printf("Apelidos: ");
    fgets(lista[i].apelidos, 60, stdin);
    lista[i].apelidos[strcspn(lista[i].apelidos, "\n")] = 0;

    printf("Localidade: ");
    fgets(lista[i].localidade, 50, stdin);
    lista[i].localidade[strcspn(lista[i].localidade, "\n")] = 0;

    printf("Telefone: ");
    scanf("%s", lista[i].telefone);

    (*n)++; // Aumentamos o total de clientes
}

//Gravar o array inteiro no ficheiro
void insereC(const char *ficheiro, Clientes clientes[], int n){
    FILE *f=fopen(ficheiro, "w");
    
    if(f != NULL){
        for(int i=0; i<n; i++){
            fprintf(f,"%d;%s;%s;%s;%s\n",
            clientes[i].id, clientes[i].nome, clientes[i].apelidos, clientes[i].localidade, clientes[i].telefone);
        }
        fclose(f);
        printf(GREEN "Dados gravados com sucesso!\n" RESET);
    } else{
        printf(RED "Erro ao abrir ficheiro de dados de clientes.\n" RESET);
    }
}

int mostraC(const char *ficheiro, Clientes clientes[], int max){
    FILE *f = fopen(ficheiro, "r");
    if (f == NULL) {
        printf(RED "Erro ao abrir ficheiro." RESET);
        return 0;
    }
    
    char linha[300];
    int i=0; //contador precisa ser fora do while != do for
    
    while (i<max && fgets (linha, 300, f)){
        sscanf(linha, "%d;%[^;];%[^;];%[^;];%s", //%[^;] serve para ler tudo até encontrar o ;
            &clientes[i].id, clientes[i].nome, clientes[i].apelidos, clientes[i].localidade, clientes[i].telefone);
            i++;
    }
    
    fclose(f);
    
    printf(YELLOW "\n--- Lista de Clientes Cadastrados ---\n" RESET);
    for (int j = 0; j < i; j++) {
        printf("ID: %d | Nome: %s | Apelidos: %s | Tel: %s\n", 
                clientes[j].id, clientes[j].nome, clientes[j].apelidos, clientes[j].telefone);
    }
    fflush(stdout);
    return i; //total de clientes lidos
}

void imprimeC(Clientes c) {
    printf("\nID: %d | Nome: %s %s | Tel: %s\n", 
        c.id, c.nome, c.apelidos, c.telefone);
} //função auxiliar para o pesquisaC e pode ser facilmente atulizada

void pesquisaC(const char *ficheiro) {
    FILE *f = fopen(ficheiro, "r");
    if (f == NULL) {
        printf(RED "Erro ao abrir o ficheiro para pesquisa.\n" RESET);
        return;
    }

    int idProcurado, encontrado = 0;
    char linha[300];
    Clientes c; // Struct que armazenar cada cliente lido

    printf("ID a pesquisar: ");
    scanf("%d", &idProcurado);

    // Varre o ficheiro linha por linha
    while (fgets(linha, 300, f)) {
        // Extrai os dados da linha para a struct temporária
        if (sscanf(linha, "%d;%[^;];%[^;];%[^;];%s", 
            &c.id, c.nome, c.apelidos, c.localidade, c.telefone) == 5) {
            
            // Verifica se é o ID que queremos
            if (c.id == idProcurado) {
                printf(GREEN "Cliente encontrado:\n" RESET);
                imprimeC(c);
                encontrado = 1;
                break; // Para de procurar assim que encontrar
            }
        }
    }

    if (!encontrado) {
        printf(RED "ID %d não encontrado!\n" RESET, idProcurado);
    }

    fclose(f);
}

void apagaC(const char *fich){
    FILE *f = fopen(fich, "r"), *t = fopen("temp.txt", "w");
    if (!f || !t) return;
    
    int idProcurado, idLido;
    char linha [300];
    int enc = 0;
    
    printf("ID a excluir: ");
    scanf("%d",&idProcurado);
    
    while(fgets(linha, 300, f)){
        sscanf(linha, "%d", &idLido); //apenas o id é lido
        if(idLido == idProcurado){
            enc = 1;
        } else {
            fputs(linha, t);
        }
    }
    
    fclose(f); fclose(t);
    remove(fich); rename("temp.txt", fich);
    printf(enc ? GREEN "Dados removidos.\n" RESET : RED "Dados não encontrados.\n" RESET); //: serve como ou
    
}

void alteraC(const char *fich) {
    FILE *f = fopen(fich, "r"), *t = fopen("temp.txt", "w");
    if (!f || !t) return;

    int idProcurado, idLido, enc = 0, op;
    char linha[300], nLoc[50], nTel[15];
    char nome[30], apel[60]; 

    printf("ID a alterar: ");
    scanf("%d", &idProcurado);

    while(fgets(linha, 300, f)) {
        if (sscanf(linha, "%d;%[^;];%[^;];%[^;];%s", &idLido, nome, apel, nLoc, nTel) == 5) {
            
            if(idLido == idProcurado) {
                enc = 1;
                printf("O que deseja alterar?\nLocalidade(1)\nTelefone(2)\nEscolha: ");
                scanf("%d", &op);
                
                if(op == 1) {
                    printf("Nova localidade: ");
                    scanf("%s", nLoc);
                } else if (op == 2) {
                    printf("Novo telefone: ");
                    scanf("%s", nTel);    
                } else {
                    printf("Opção inválida, nenhum dado alterado.\n");
                }
                
                // Grava a linha (dentro do if do id encontrado)
                fprintf(t, "%d;%s;%s;%s;%s\n", idLido, nome, apel, nLoc, nTel);
            } else {
                // Se o ID não for o procurado, mantém a linha original
                fputs(linha, t);
            }
        }
    }

    fclose(f); fclose(t);
    remove(fich); rename("temp.txt", fich);
    printf(enc ? GREEN "Dados atualizados!\n" RESET : RED "ID não encontrado.\n" RESET);
}