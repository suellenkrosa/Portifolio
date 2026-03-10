/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package project1.pkg8;

import java.util.Scanner;

/**
 *
 * @author cfiute
 */
public class Project18 {

    public static void menu() {
        System.out.println("Calculando com métodos");
        System.out.println("1 - Soma");
        System.out.println("2 - Subtração");
        System.out.println("3 - Divisão");
        System.out.println("4 - Multiplicação");
        System.out.println("5 - Par/ímpar");
        System.out.println("6 - Equação 1o grau");
        System.out.println("7 - Equação 2o grau");
        System.out.println("8 - Quadrado");
        System.out.println("9 - Multiplo de 5");
        System.out.println("0 - Sair");
    }

    public static int pedeInt(String st) {
        Scanner obj = new Scanner(System.in);
        System.out.print(st);
        int n = obj.nextInt();
        return n;
    }

    public static double pedeDouble(String st) {
        Scanner obj = new Scanner(System.in);
        System.out.print(st);
        double m = obj.nextDouble();
        return m;
    }

    public static double soma(double n1, double n2) {
        double s;
        s = n1 + n2;
        return s;
    }

    public static double subtracao(double n1, double n2) {
        double sub;
        sub = n1 - n2;
        return sub;
    }

    public static double divisao(double n1, double n2) {
        double div;
        div = n1 / n2;
        return div;
    }

    public static double multiplicacao(double n1, double n2) {
        double mult;
        mult = n1 * n2;
        return mult;
    }

    public static double parImpar(double n1) {
        if (n1 % 2 == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public static double funcao(double n1, double n2) {
        double x;
        x = -n1 / n2;
        return x;
    }

    public static double equa2grau(double a, double b, double c) {
        double r1 = b * b;
        double r2 = 4 * a * c;
        double r3 = r1 - r2;
        double r4 = Math.sqrt(r3);
        double r5 = -b + r4;
        double r6 = 2 * a;
        double result = r5 / r6;
        return result;
    }

    public static double equa2grau1(double a, double b, double c) {
        double r1 = b * b;
        double r2 = 4 * a * c;
        double r3 = r1 - r2;
        double r4 = Math.sqrt(r3);
        double r5 = -b - r4;
        double r6 = 2 * a;
        double result = r5 / r6;
        return result;
    }

    public static double quad(double n1) {
        double result = n1 * n1;
        return result;
    }

    public static double mult5(double n1) {
        double res = n1 % 5;
        if (res == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public static void escolha() {
        menu();
        double n1, n2, n3, result, result1;
        int a = pedeInt("Insira a opção: ");
        System.out.println(a);
        switch (a) {
            case 1:
                n1 = pedeDouble("Insira o primeiro número: ");
                n2 = pedeDouble("Insira o segundo número: ");
                result = soma(n1, n2);
                System.out.println("A soma é: " + result);
                break;
            case 2:
                n1 = pedeDouble("Por favor, insira o primeiro número: ");
                n2 = pedeDouble("Agora, o segundo número: ");
                result = subtracao(n1, n2);
                System.out.println("A diferença é: " + result);
                break;
            case 3:
                n1 = pedeDouble("Por favor, insira o primeiro número: ");
                n2 = pedeDouble("Agora, o segundo número: ");
                result = divisao(n1, n2);
                System.out.println("O quociente é: " + result);
                break;
            case 4:
                n1 = pedeDouble("Por favor, insira o primeiro número: ");
                n2 = pedeDouble("Agora, o segundo número: ");
                result = multiplicacao(n1, n2);
                System.out.println("O produto é: " + result);
                break;
            case 5:
                n1 = pedeDouble("Por favor, insira o primeiro número: ");
                result = parImpar(n1);
                if (result == 0) {
                    System.out.println("O número inserido é par");
                } else {
                    System.out.println("O número inserido é ímpar");
                }
                break;
            case 6:
                n1 = pedeDouble("Por favor, insira o primeiro número: ");
                n2 = pedeDouble("Agora, o segundo número: ");
                result = funcao(n1, n2);
                System.out.println("O resultado é: " + result);
                break;
            case 7:
                n1 = pedeDouble("Por favor, insira o primeiro número: ");
                n2 = pedeDouble("Agora, o segundo número: ");
                n3 = pedeDouble("Por último, o terceiro número: ");
                result = equa2grau(n1, n2, n3);
                result1 = equa2grau1(n1, n2, n3);
                System.out.println("O resultado de X1 é: " + result);
                System.out.println("O resultado de X2 é: " + result1);
                break;
            case 8:
                n1 = pedeDouble("Por favor, o número: ");
                result = quad(n1);
                System.out.println("O quadrado é: " + result);
                break;
            case 9:
                n1 = pedeDouble("Por favor, o número: ");
                result = mult5(n1);
                System.out.println("O resultado é: " + result);
                break;
            case 0:
                System.out.println("Saindo da calculadora.");
                System.out.println("Adeuzinho!");
                break;

            default:
                System.out.println("Opção Inválida");
                
        }
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        escolha();
    }
}
