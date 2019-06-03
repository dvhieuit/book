package com.dac.demo.repository;

import com.dac.demo.entity.EmployeeEntity;
import com.dac.demo.model.enums.RoleName;
import com.dac.demo.model.enums.StatusName;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;
import java.util.Optional;


@Repository
public interface EmployeeRepository extends JpaRepository<EmployeeEntity, Integer> {
    Optional<EmployeeEntity> findByEmail(String email);
    List<EmployeeEntity> findByDeletedAndRoleName(boolean deleted, RoleName roleName);
    boolean existsByEmail(String email);
    EmployeeEntity findByIdAndDeletedAndStatusNameAndRoleName(int id, boolean deleted, StatusName statusName, RoleName roleName);
    boolean existsByEmailAndDeleted(String email, boolean deleted);
    Optional<EmployeeEntity> findByIdAndDeletedAndRoleName(int id, boolean deleted, RoleName roleName);
    Optional<EmployeeEntity> findByIdAndDeletedAndRoleNameOrIdAndDeletedAndRoleName(int id1, boolean deleted1, RoleName roleName1, int id2, boolean deleted2, RoleName roleName2);    
}