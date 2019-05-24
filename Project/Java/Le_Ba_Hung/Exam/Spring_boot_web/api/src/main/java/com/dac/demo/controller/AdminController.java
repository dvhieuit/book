package com.dac.demo.controller;

import com.dac.demo.model.ServiceResult;
import com.dac.demo.service.AdminService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;
import com.dac.demo.model.req.*;

import javax.validation.Valid;


@RestController
public class AdminController {

    @Autowired
    AdminService adminService;

    @CrossOrigin(origins = "http://localhost:3001")
    @PostMapping("/create")
    public ResponseEntity<ServiceResult> createEmployee(@Valid @RequestBody AdminCreateUserRequest request) {
        return new ResponseEntity<>(adminService.createEmployee(request.getFullName(),
                request.getPhoneNumber(),
                request.getEmail(),
                request.getPassword(),
                request.getImageURL(),
                request.getStatus(),
                request.getRole()),
                HttpStatus.OK);
    }
}
