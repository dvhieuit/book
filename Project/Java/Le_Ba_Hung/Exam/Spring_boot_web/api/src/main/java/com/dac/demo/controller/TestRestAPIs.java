package com.dac.demo.controller;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.GetMapping;

@RestController
public class TestRestAPIs {
    @GetMapping("/home")
    public String welcome(){
        return "welcome";
    }
    @CrossOrigin(origins = "http://localhost:3001")
    @GetMapping("/login")
    public String login(){
        return "login";
    }
    @GetMapping("/user")
    public String getUser(){
        return "user";
    }
}
