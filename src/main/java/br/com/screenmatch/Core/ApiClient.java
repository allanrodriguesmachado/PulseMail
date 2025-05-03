package br.com.screenmatch.Core;

import java.net.http.HttpClient;

public class ApiClient {
    public HttpClient apiHttpClient(String url)
    {
        return HttpClient.newHttpClient();
    }
}
