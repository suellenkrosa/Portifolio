package project2.pkg5_jogo_galo;

import java.util.Scanner;

public class Project25_Jogo_Galo {

    public static void preencheTab(char[][] mat){
	for(int i=0; i<3; i++){
            for(int j=0; j<3; j++)
                mat[i][j] = ' '; 
	}
    }
    
    public static void preencheTab1(char mat[][] , int l, int c, char jogador){  //o resto é ref a jogada, não a coordenada
        if(mat[l][c] == ' '){
            if(jogador == 'X'){
                mat[l][c] = 'X';
            } else {
            mat[l][c] = 'O';
            }
        } else {
            System.out.println("Posição já ocupada! Escolha outra.");
        }
    }
    
        public static int preencheMat(char mat[][],int l, int c, int jogada){
        //int i,j;
        int resto = jogada%2; int fim;
        if(resto==1){
            mat[l][c] = 'X';
            
            fim = verificaGanhador(mat, 'X');
            if(fim!=0){
                System.out.println("Jogo terminado. O X venceu");
                return -1;
            }
        }else{
            mat[l][c] = 'O';
            fim = verificaGanhador(mat, 'O');
            if(fim!=0){
                System.out.println("Jogo terminado. O O venceu");
                return -1;
            }
        }
        return 1;
    }
    
    public static void mostraTab(char mat[][]){
        for(int i=0; i<3; i++){
            for(int j=0; j<3; j++){
                System.out.print(mat[i][j] + "|");
            }
            System.out.println();
        }
    }
    
    public static void caracteres(char mat[][] , int l, int c, char jogador){
        if (l>=0 && l<3 && c >= 0 && c<3){
            if(mat[l][c] == ' '){
                mat[l][c] = jogador;
            } else{
                System.out.println("Posição ocupada");
            }
        }else{
            System.out.println("Posição inválida");
        }
    }
    
    public static int pedeInt(String p){
        Scanner tec = new Scanner(System.in);
        System.out.println(p);
        int n = tec.nextInt();
        return n;
    }
       
    public static int verificaGanhador(char mat[][], char c){
        if(mat[0][0] == c && mat[0][1] == c && mat[0][2] == c||
           mat[1][0] == c && mat[1][1] == c && mat[1][2] == c||
           mat[2][0] == c && mat[2][1] == c && mat[2][2] == c||
           mat[0][0] == c && mat[1][0] == c && mat[2][0] == c||
           mat[0][1] == c && mat[1][1] == c && mat[2][1] == c||
           mat[0][2] == c && mat[1][2] == c && mat[2][2] == c||
           mat[0][0] == c && mat[1][1] == c && mat[2][2] == c||
           mat[2][0] == c && mat[1][1] == c && mat[0][2] == c){
            mostraTab(mat);
            return 1;
        }
        return 0;
    }
    
    public static int verificaMat(char m[][],int l, int c){
        if(m[l][c]==' '){
            return 1;
        }else{
            return 0;
        }
    }
           
    public static void tabuleiro(){
    char[][] mat = new char [3][3];
    int l, c, verif, termina, jogada=1;
    preencheTab(mat);

    while(jogada <= 9){
        l = pedeInt("Insira a linha (0-2): ");
        c = pedeInt("Insira a coluna (0-2): ");
        verif = verificaMat(mat, l, c);
       
        if(verif == 1){ 
            termina = preencheMat(mat, l, c, jogada);
            
            mostraTab(mat);
            jogada++;
            if(termina == -1){
                jogada = 20;
            }
        } else {
            System.out.println("Posição ocupada. Escolha outra.");
            }
        }
        if(jogada == 10){
            System.out.println("O jogo empatou");
        }
   
    }

    public static void main(String[] args) {
        tabuleiro();
    }
    
}
