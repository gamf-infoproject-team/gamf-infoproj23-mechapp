package com.gmech.customer.controller;

import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import lombok.RequiredArgsConstructor;

import com.gmech.customer.service.CustomerService;
import com.gmech.customer.customer.CustomerRequest;
import com.gmech.customer.customer.CustomerResponse;

@RestController
@RequestMapping(value = "/api/v1/customer")
@RequiredArgsConstructor
public class CustomerController {
    
    private final CustomerService service;

    @PostMapping(value = "/create")
    public ResponseEntity<CustomerResponse> create(@RequestBody CustomerRequest request) {
        return ResponseEntity.ok(service.create(request));
    }
}
