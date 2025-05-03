package br.com.screenmatch;

import java.io.IOException;
import java.net.URI;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.util.Scanner;

import br.com.screenmatch.exception.ExceptionIntError;
import com.google.gson.Gson;

import br.com.screenmatch.Core.ApiClient;
import br.com.screenmatch.Movie.CreateTitle;

public class Main {
    public static void main(String[] args) throws IOException, InterruptedException {
        final var scanner = new Scanner(System.in);

        System.out.println("Digite o nome do filme: ");
        String nameMovie = scanner.next();
        try {
            // var client = HttpClient.newHttpClient();
            String urlMovie = String.format("http://www.omdbapi.com/?t=%s&apikey=ddfa918f", nameMovie);

            var client = new ApiClient();
            var request = HttpRequest.newBuilder().uri(URI.create(urlMovie)).build();
            var response = client.apiHttpClient(urlMovie).send(request, HttpResponse.BodyHandlers.ofString());
            System.out.println(response.body());

            String json = response.body();
            Gson newGson = new Gson();
            CreateTitle titleMovie = newGson.fromJson(json, CreateTitle.class);

            if(titleMovie.Year().length() > 4) {
                throw new ExceptionIntError("Atencao! O Filme " + titleMovie.Title() + " Esta como ano invalido");
            }

            System.out.println("Name Movie: " + titleMovie.Title());
            System.out.println("Yaer Movie: " + Integer.valueOf(titleMovie.Year()));
            System.out.println("Gente Movie: " + titleMovie.Genre());
        } catch ( ExceptionIntError e) {
            System.out.println(e.messageException());
        }
    }
}