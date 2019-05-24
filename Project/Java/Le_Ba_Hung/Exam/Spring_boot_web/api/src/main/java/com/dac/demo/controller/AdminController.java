package com.dac.demo.controller;

import com.dac.demo.model.ServiceResult;
import com.dac.demo.service.AdminService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;
import com.dac.demo.model.req.*;

import javax.validation.Valid;


@RestController
@CrossOrigin(origins = "http://localhost:3001")
@RequestMapping("/api/admin")
@PreAuthorize("hasRole('ADMIN')")
public class AdminController {

    @Autowired
    AdminService adminService;

    @GetMapping("/all")
    public ResponseEntity<ServiceResult> getAllEmployee() {
        return new ResponseEntity<>(adminService.getAllCustomer(), HttpStatus.OK);
    }


    @PostMapping("/create")
    public ResponseEntity<ServiceResult> createEmployee(@Valid @RequestBody AdminCreateUserRequest request) {
        return new ResponseEntity<>(adminService.createEmployee(
                request.getFullName(),
                request.getPhoneNumber(),
                request.getEmail(),
                request.getPassword(),
                request.getImageURL(),
                request.getStatus(),
                request.getRole()),
                HttpStatus.OK);
    }
}
