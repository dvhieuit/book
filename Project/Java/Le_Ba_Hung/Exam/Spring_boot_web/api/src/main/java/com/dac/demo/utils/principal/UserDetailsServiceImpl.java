package com.dac.demo.utils.principal;

import com.dac.demo.entity.EmployeeEntity;
import com.dac.demo.repository.EmployeeRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class UserDetailsServiceImpl implements UserDetailsService {

    @Autowired
    EmployeeRepository employeeRepository;

    @Override
    @Transactional
    public UserDetails loadUserByUsername(String email)
    {

        EmployeeEntity customer = employeeRepository.findByEmail(email)
                .orElseThrow(()-> new UsernameNotFoundException("No user found with email " + email));
        return com.dac.demo.utils.principal.UserPrincipal.build(customer);
    }
}