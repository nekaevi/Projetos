string nome, sobrenome, nome_i, corte, troca;

int pos;

Console.Write("Digite seu nome completo: ");

nome = Console.ReadLine();

pos = nome.IndexOf(" ");

nome_i = nome.Substring(0, pos);

Console.WriteLine("Nome: " + nome_i);

sobrenome = nome.Substring(pos);

Console.WriteLine("Sobrenome: " + sobrenome);

troca = nome.Replace("a", "o");

Console.WriteLine("Troca: " + troca);

corte = nome.Substring(5, 10);

Console.WriteLine("Nome cortado: " + corte);

Console.ReadKey();



