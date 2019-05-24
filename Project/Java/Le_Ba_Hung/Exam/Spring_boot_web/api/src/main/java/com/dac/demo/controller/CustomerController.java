package com.dac.demo.controller;

import com.dac.demo.model.ServiceResult;
import com.dac.demo.model.req.*;
import com.dac.demo.service.CustomerService;
import com.dac.demo.utils.jwt.JwtProvider;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;

@CrossOrigin(origins = "*", maxAge = 3600)
@RestController
@RequestMapping("/api/customer")
public class CustomerController {
    @Autowired
    CustomerService customerService;

    @Autowired
    PasswordEncoder encoder;

    @Autowired
    JwtProvider jwtProvider;

    @Autowired
    AuthenticationManager authenticationManager;

    @PostMapping("/signup")
    public ResponseEntity<ServiceResult> customerSignUp(@Valid @RequestBody CustomerSignUpRequest request) {
        return new ResponseEntity<>(customerService.signUpCustomer(
                request.getEmail(),
                request.getPassword(),
                request.getFullName(),
                request.getPhoneNumber()),
                HttpStatus.OK);
    }

    @PostMapping("/signin")
    public ResponseEntity<ServiceResult> signIn(@Valid @RequestBody CustomerSignInRequest request) {
        return new ResponseEntity<>(customerService.signIn(request.getEmail(),
                request.getPassword()), HttpStatus.OK);
    }

    @DeleteMapping("/signout")
    public ResponseEntity<ServiceResult> signOut(@RequestHeader(value = "Authorization") String token) {
        return new ResponseEntity<>(customerService.signOut(token), HttpStatus.OK);
    }

    @GetMapping("/getById")
    @PreAuthorize("hasRole('CUSTOMER')")
    public ResponseEntity<ServiceResult> getInfoById(@RequestHeader(value = "Authorization") String token) {
        return new ResponseEntity<>(customerService.getInfo(token), HttpStatus.OK);
    }



    @GetMapping("/getRole")
    public ResponseEntity<ServiceResult> getRole(@RequestHeader(value = "Authorization") String token){
        return new ResponseEntity<>(customerService.returnRole(token),HttpStatus.OK);
    }

}