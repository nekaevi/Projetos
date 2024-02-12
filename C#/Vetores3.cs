string nome, nome_i;

int pos;

Console.Write("Digite seu nome completo: ");

nome = Console.ReadLine();

pos = nome.IndexOf(" ");

nome_i = nome.Substring(0, pos);

Console.WriteLine("Email: " + nome_i +"@fatec.sp.gov.br");

Console.ReadKey();




