package br.com.screenmatch.exception;

public class ExceptionIntError extends RuntimeException{
    private final String message;

    public ExceptionIntError(String message) {
        this.message = message;
    }

    public String messageException()
    {
        return this.message;
    }
}
