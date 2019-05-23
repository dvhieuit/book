package com.dac.demo.repository;

import com.dac.demo.entity.EmployeeEntity;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;


@Repository
public interface EmployeeRepository extends JpaRepository<EmployeeEntity, Integer> {
    boolean existsByEmail(String email);
    Optional<EmployeeEntity> findByEmail(String email);
    boolean existsByEmailAndDeleted(String email, boolean deleted);
}