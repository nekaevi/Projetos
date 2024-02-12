string[,] poltrona = new string[47, 2];

for (int l = 0; l < 47; l++){

poltrona[l, 0] = Convert.ToString(l);
poltrona[l, 1] = "Livre";

}

inicio:

Console.WriteLine("1 – Inserir Poltrona (OCUPADA)");
Console.WriteLine("2 – Alterar Poltrona (LIVRE)");
Console.WriteLine("3 – Listar Poltronas (TODAS)");
Console.WriteLine("4 – Buscar Poltronas(ESPECÍFICA");
Console.WriteLine("5 – Liberar Poltronas (TODAS)");
Console.WriteLine("6 – Sair.");

Console.WriteLine("Digite a opção desejada: ");

string op = Console.ReadLine();

switch (op){

case "1":

Console.Write("Digite o número da poltrona: ");

string np = Console.ReadLine();

for (int l = 1; l < 47; l++){

if (np == poltrona[l, 0]){

poltrona[l, 1] = "Ocupado";
Console.Write("Sua poltrona foi reservada(ocupada)!!!");

}
}

Console.ReadKey();
Console.Clear();

goto inicio;

case "2":

Console.WriteLine("Digite o número da poltrona que vai seralterada: ");

string PR = Console.ReadLine();

for (int l = 1; l < 47; l++){

if (PR == poltrona[l, 0]){

if (poltrona[l, 1] == "Ocupado"){

poltrona[l, 1] = "LIVRE";

Console.WriteLine("Sua poltrona foi alterada!");

}
}
}

Console.WriteLine("Digite o número da sua nova poltrona: ");

string pr = Console.ReadLine();

for (int l = 1; l < 47; l++){

if (pr == poltrona[l, 0]){

poltrona[l, 1] = "OCUPADO";

Console.WriteLine("Sua poltrona foi alterada!");

}

}

Console.ReadKey();

Console.Clear();

goto inicio;

case "3":

for (int l = 1; l < 47; l++){

for (int c = 0; c < 2; c++){

Console.Write(poltrona[l, c] + " ");

}

Console.WriteLine();

}

Console.ReadKey();

Console.Clear();

goto inicio;

case "4":

Console.WriteLine("Digite o número da poltrona que deseja buscar: ");

int np3 = Convert.ToInt32(Console.ReadLine());

Console.WriteLine("Poltrona: " + poltrona[np3, 1]);

Console.ReadKey();
Console.Clear();

goto inicio;

case "5":

Console.WriteLine();

Console.Write("Deseja liberar qual poltrona? ");

string n_liberar = Console.ReadLine();

for (int l = 1; l < 47; l++){

if (n_liberar == poltrona[l, 0])
{

poltrona[l, 1] = "Livre";

Console.WriteLine("Todas as poltronas estão livres!!!");
}

}

Console.ReadKey();

Console.Clear();

goto inicio;

case "6":

Console.WriteLine("Você está saindo");

break;

}

Console.ReadKey();

