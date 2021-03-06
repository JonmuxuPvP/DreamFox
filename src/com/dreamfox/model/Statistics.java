package com.dreamfox.model;

public class Statistics {
    private int words, characters, lucidDreams, normalDreams, totalDreams;
    private boolean isBalanced;

    public Statistics(int words, int characters, int lucidDreams, int normalDreams, int totalDreams) {
        this.words = words;
        this.characters = characters;
        this.lucidDreams = lucidDreams;
        this.normalDreams = normalDreams;
        this.totalDreams = totalDreams;
        this.isBalanced = lucidDreams + normalDreams == totalDreams;
    }

    public int getWords() {
        return words;
    }

    public int getCharacters() {
        return characters;
    }

    public int getLucidDreams() {
        return lucidDreams;
    }

    public int getNormalDreams() {
        return normalDreams;
    }

    public int getTotalDreams() {
        return totalDreams;
    }

    @Override
    public String toString() {
        String result = "[DreamFox Statistics]\nWords: " + words + "\nCharacters: " + characters
                + "\nLucid: " + lucidDreams + "\nNormal: " + normalDreams + "\nTotal: " + totalDreams + "\n";
        if (!isBalanced) {
            result += "[!]";
        }
        return result;
    }
}
