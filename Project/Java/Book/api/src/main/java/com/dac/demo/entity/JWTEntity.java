package com.dac.demo.entity;

import javax.persistence.*;

@Entity
@Table(name = "jwt")
public class JWTEntity {
    @Id
    @GeneratedValue( strategy = GenerationType.IDENTITY)
    private int id;

    private String token;

    public int getId() {
        return this.id;
    }

    public String getToken() {
        return this.token;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setToken(String token) {
        this.token = token;
    }
}
