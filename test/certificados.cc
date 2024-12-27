#include <iostream>
#include <fstream>
#include <string>
#include <vector>
#include <sstream>
#include <stdexcept>

using namespace std;

// Left trim the given string ("  hello!  " --> "hello!  ")
string left_trim(string str)
{
    int numStartSpaces = 0;
    for (int i = 0; i < str.length(); i++)
    {
        if (!isspace(str[i]))
            break;
        numStartSpaces++;
    }
    return str.substr(numStartSpaces);
}

// Right trim the given string ("  hello!  " --> "  hello!")
string right_trim(string str)
{
    int numEndSpaces = 0;
    for (int i = str.length() - 1; i >= 0; i--)
    {
        if (!isspace(str[i]))
            break;
        numEndSpaces++;
    }
    return str.substr(0, str.length() - numEndSpaces);
}

// Left and right trim the given string ("  hello!  " --> "hello!")
string trim(string str)
{
    return right_trim(left_trim(str));
}

string split(const string &str, char delimiter, size_t position)
{
    vector<string> tokens;
    string token;
    istringstream tokenStream(str);

    // Dividir la cadena en tokens
    while (getline(tokenStream, token, delimiter))
    {
        tokens.push_back(token);
    }

    // Validar que la posición solicitada esté dentro de los límites
    if (position >= tokens.size())
    {
        throw out_of_range("La posición está fuera de los límites del split.");
    }

    return tokens[position];
}

void processFile(const string &inputFileName, const string &outputFileName)
{
    ifstream inputFileContador(inputFileName); // Archivo de entrada
    ofstream outputFile(outputFileName);       // Archivo de salida genero mi nuevo archivo

    if (!inputFileContador.is_open())
    {
        cerr << "No se pudo abrir el archivo de entrada: " << inputFileName << endl;
        return;
    }

    if (!outputFile.is_open())
    {
        cerr << "No se pudo abrir el archivo de salida: " << outputFileName << endl;
        return;
    }

    string linea;
    string nombreModelo; // registroVentas.php
    int longitud;
    int contador;
    int totallineas;

    nombreModelo = outputFileName;
    longitud = nombreModelo.length();
    nombreModelo = nombreModelo.substr(0, longitud - 4); // revisar

    cout << longitud << endl;
    cout << nombreModelo << endl;

    outputFile << "<?php" << endl;
    outputFile << "require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';" << endl;
    outputFile << "" << endl;
    outputFile << "// TODO LO RELACIONADO A LA BASE DE DATOS, DEBE DE ESTAR EN EL MODELO" << endl;
    outputFile << "// UN MODELO POR LO REGULAR APUNTA A UNA TABLA O UNA VISTA" << endl;
    outputFile << "class modelo" + nombreModelo << endl;
    outputFile << "{" << endl;
    outputFile << "" << endl;
    outputFile << "    private $conexion;" << endl;
    outputFile << "" << endl;
    outputFile << "    // al instanciar la clase debo obtener la conexion " << endl;
    outputFile << "    public function __construct()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $this->conexion = Conexion::obtenerConexion();" << endl;
    outputFile << "    }" << endl;
    outputFile << "" << endl;
    outputFile << "    // debe hacer un metodo para hacer select" << endl;
    outputFile << "    public function obtener" + nombreModelo + "()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = $this->conexion->query('select '." << endl;

    totallineas = 0;
    while (getline(inputFileContador, linea))
    {
        totallineas++;
    }

    ifstream inputFile(inputFileName);
    string campos[150];
    contador = 0;
    while (getline(inputFile, linea))
    {
        contador++;
        if ((contador > 2) && (contador < totallineas - 1))
        {

            string lineaCodigo = linea;
            lineaCodigo = trim(lineaCodigo);
            lineaCodigo = split(lineaCodigo, ' ', 0);
            campos[contador]=lineaCodigo;

            lineaCodigo = "                                        '" + lineaCodigo + ",'.";
            // Escribir las mitades en el archivo de salida
            outputFile << lineaCodigo << endl;
        }
    }
    outputFile << "                                        'from " + nombreModelo + "');" << endl;
    outputFile << "        return $query->fetchAll(PDO::FETCH_ASSOC);" << endl;
    outputFile << "    }" << endl;
    outputFile << "    " << endl;


    outputFile << "    // debe hacer un metodo para hacer insert" << endl;


    outputFile << "    public function insertar"+nombreModelo+"(" << endl;
    
    for (int i=3;i<contador-1;i++) {
    outputFile << "    $"+campos[i]+"," << endl;
    }

    outputFile << "    )" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = 'INSERT INTO usuarios('." << endl;
    for (int i=3;i<contador-1;i++) {
    outputFile << "                '"+campos[i]+",'." << endl;
    }
    outputFile << "                 ') VALUES( '." << endl;

    for (int i=3;i<contador-1;i++) {
    outputFile << "                 ': "+campos[i]+",'." << endl;
    }

    outputFile << "                  ') ';" << endl;

    outputFile << "        //statement o sentencia" << endl;
    outputFile << "        //HOLA!" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;


    for (int i = 3; i < contador - 1; i++) {
    outputFile << "        $stmt->bindParam(':" << campos[i] << "', $" << campos[i] << ");" << endl;
    }

    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;

    outputFile << "    public function Eliminar"+nombreModelo+"(" << endl;
    


    outputFile << " }" << endl;
    cout << "Modelo Generado. Archivo generado: " << outputFileName << endl;

    inputFile.close();
    outputFile.close();
}

int main(int argc, char *argv[])
{
    if (argc != 3)
    {
        cerr << "Uso del comando ArtisanMakeModel: " << argv[0] << " <archivo_entrada> <archivo_salida>" << endl;
        return 1;
    }

    string inputFileName = argv[1];
    string outputFileName = argv[2];

    processFile(inputFileName, outputFileName);
    
    

    return 0;
}