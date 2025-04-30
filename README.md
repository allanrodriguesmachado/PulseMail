## 🎬 ScreenMatch - Consulta de Filmes

Este é um projeto simples em Java que consome a API pública [OMDb API](https://www.omdbapi.com/) para buscar informações sobre filmes.

### 📌 Funcionalidades

- Solicita ao usuário o nome de um filme via terminal.
- Faz uma requisição HTTP para a OMDb API.
- Exibe o JSON de resposta com informações do filme.

### 🛠️ Tecnologias utilizadas

- Java 17+
- Biblioteca `HttpClient` (padrão a partir do Java 11)
- OMDb API

### ▶️ Como executar

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/screenmatch.git
   ```
2. Navegue até a pasta do projeto:
   ```bash
   cd screenmatch
   ```
3. Compile e execute:
   ```bash
   javac Main.java
   java br.com.screenmatch.Main
   ```

4. Digite o nome de um filme (ex: `Inception`) quando solicitado.

### 🔑 API Key

Este projeto usa a chave de API gratuita fornecida pela OMDb. Se você quiser usar sua própria chave (recomendado), altere o valor no código:

```java
String urlMovie = String.format("http://www.omdbapi.com/?t=%s&apikey=SUA_API_KEY", nameMovie);
```

### 💡 Melhorias planejadas

- Tratar entradas compostas (como "O Poderoso Chefão")
- Fazer parsing do JSON e exibir as informações formatadas
- Criar uma interface gráfica simples
- Salvar histórico das buscas
