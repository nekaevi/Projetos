string nome, nome_i, nome_u;

int pos;

int fim;

Console.Write("Digite seu nome completo: ");

nome = Console.ReadLine();

pos = nome.IndexOf(" ");

fim = nome.LastIndexOf(" ");

nome_i = nome.Substring(0, pos);

nome_u = nome.Substring(fim);

Console.WriteLine("Email: " + nome_i + "." + nome_u+ "@fatec.sp.gov.br");

Console.ReadKey();