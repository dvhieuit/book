package com.dac.demo.repository;

import com.dac.demo.entity.JWTEntity;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface JWTRepository extends JpaRepository<JWTEntity, Integer> {
    Optional<JWTEntity> findByToken(String code);
}
