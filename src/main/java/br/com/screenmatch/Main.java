package br.com.screenmatch;

import java.io.IOException;
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) throws IOException, InterruptedException {
        @SuppressWarnings("resource")
        final var scanner = new Scanner(System.in);

        System.out.println("Digite o nome do filme: ");
        String nameMovie = scanner.next();
        String urlMovie = String.format("http://www.omdbapi.com/?t=%s&apikey=ddfa918f", nameMovie);

        var client = HttpClient.newHttpClient();
        var request = HttpRequest.newBuilder().uri(URI.create(urlMovie)).build();
        var response = client.send(request, HttpResponse.BodyHandlers.ofString());
        System.out.println(response.body());
    }
}