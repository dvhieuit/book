package com.dac.demo.controller;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class TestRestAPIs {
    @GetMapping("/home")
    public String welcome(){
        return "welcome";
    }
    @CrossOrigin(origins = "http://localhost:3001")
    @GetMapping("/test")
    public String login(){
        return "test";
    }
    @GetMapping("/user")
    public String getUser(){
        return "user";
    }
}
