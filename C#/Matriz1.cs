int qtd_alunos, qtd_aval;

Console.WriteLine("Qual a quantidade de alunos: ");

qtd_alunos = Convert.ToInt32(Console.ReadLine());

Console.WriteLine("Qual a quantidade de avaliações: ");

qtd_aval = Convert.ToInt32(Console.ReadLine());

int[,] matriz = new int[qtd_alunos, qtd_aval + 1];

for (int l = 0; l < qtd_alunos; l++){

for (int c = 0; c < qtd_aval; c++) {

Console.WriteLine("Digite a nota: " + (l + 1) + " da avaliação: " + (c + 1));

matriz[l, c] = Convert.ToInt32(Console.ReadLine());

}

}

double media = 0;

for(int m = 0; m < qtd_alunos; m++){

for(int i = 0; i < qtd_aval; i++){

media = media + matriz[m, i];

}

}

double media_final = media/ (qtd_alunos + qtd_aval);

Console.WriteLine("A média aritmética das notas é: " + media_final);

Console.ReadKey();