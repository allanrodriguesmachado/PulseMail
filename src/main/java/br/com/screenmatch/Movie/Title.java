package br.com.screenmatch.Movie;

import com.google.gson.annotations.SerializedName;

public class Title {
    @SerializedName("Title")
    private String title;

    public String getTitle() 
    {
        return this.title;
    }
}
