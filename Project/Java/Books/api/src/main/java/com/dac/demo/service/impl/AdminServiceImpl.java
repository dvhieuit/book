package com.dac.demo.service.impl;

import com.dac.demo.constant.AdminUserCreateConst;
import com.dac.demo.entity.*;
import com.dac.demo.model.ServiceResult;
import com.dac.demo.model.enums.RoleName;
import com.dac.demo.model.req.AdminCreateProductRequest;
import com.dac.demo.model.req.AdminCreateUserRequest;
import com.dac.demo.model.resp.*;
import com.dac.demo.repository.*;
import com.dac.demo.service.AdminService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;


@Service
public class AdminServiceImpl implements AdminService {

    @Autowired
    EmployeeRepository employeeRepository;
    @Autowired
    ProductEntityRepository productEntityRepository;

    @Autowired
    PasswordEncoder encoder;

    private AdminGetAllCustomerResponse createGetAllCustomerResponse(EmployeeEntity entity) {
        return new AdminGetAllCustomerResponse(entity.getId(),
                entity.getFullName(),
                entity.getPhoneNumber(),
                entity.getEmail(),
                entity.getStatus().getName().name());

    }

    private List<AdminGetAllCustomerResponse> createCustomerGetResponseList() {
        List<EmployeeEntity> customerList = employeeRepository.findByDeletedAndRoleName(false,
                RoleName.ROLE_CUSTOMER);
        List<AdminGetAllCustomerResponse> responseList = new ArrayList<>();
        for (EmployeeEntity entity : customerList) {
            responseList.add(createGetAllCustomerResponse(entity));
        }
        return responseList;
    }

    @Override
    public ServiceResult getAllCustomer() {
        ServiceResult result = new ServiceResult();
        List<AdminGetAllCustomerResponse> employeeEntityList = createCustomerGetResponseList();
        result.setMessage("Get all customers successfully");
        result.setData(employeeEntityList);
        return result;
    }

    @Override
    public ServiceResult createEmployee(String fullName, String phoneNumber, String email, String password,
                                        String imageURL, String statusName, String roleName) {
        ServiceResult result = new ServiceResult();
        if (fullName != null && phoneNumber != null && email != null && password != null &&
                statusName != null && roleName != null) {


                boolean isEmailExisted = employeeRepository.existsByEmail(email);
                if (!isEmailExisted) {
                    EmployeeEntity employee = new EmployeeEntity(fullName, phoneNumber, email,
                            encoder.encode(password),
                            imageURL);

                    RoleEntity role = new RoleEntity();
                    role.setId(Integer.parseInt(roleName));
                    employee.setRole(role);

                    StatusEntity status = new StatusEntity();
                    status.setId(Integer.parseInt(statusName));
                    employee.setStatus(status);

                    employeeRepository.save(employee);
                    AdminCreateUserResponse response = new AdminCreateUserResponse(employee.getId(),
                            employee.getFullName(),
                            employee.getPhoneNumber(),
                            employee.getEmail(),
                            employee.getImageURL());

                    result.setMessage(AdminUserCreateConst.SUCCESS);
                    result.setData(response);
                } else {
                    result.setStatus(ServiceResult.Status.FAILED);
                    result.setMessage(AdminUserCreateConst.EMAIL_EXIST);
                }
        } else {
            result.setMessage(AdminUserCreateConst.NULL_DATA);
            result.setStatus(ServiceResult.Status.FAILED);
        }

        return result;
    }

    @Override
    public ServiceResult getAllProducts() {
        ServiceResult result = new ServiceResult();
        List<ProductEntity> allProductEntities = productEntityRepository.findAll();
        List<AdminGetAllProductResponse> responseData = new ArrayList<>();

        for (ProductEntity productEntity : allProductEntities) {
            responseData.add(productEntityToAdminGetAllProductResponse(productEntity));
        }

        result.setMessage("get all products");
        result.setStatus(ServiceResult.Status.SUCCESS);
        result.setData(responseData);
        return result;

//        responseData = allProductEntities.stream()
//                .map(this::productEntityToAdminGetAllProductResponse)
//                .collect(Collectors.toList());
    }

    private AdminGetAllProductResponse productEntityToAdminGetAllProductResponse(ProductEntity productEntity) {
        return new AdminGetAllProductResponse(
                productEntity.getId(),
                productEntity.getName(),
                productEntity.getPrice(),
                productEntity.getQuantity(),
                productEntity.getDescription(),
                productEntity.getImage(),
                productEntity.getCatalogId(),
                productEntity.getUserId()
        );
    }

    @Override
    public ServiceResult<AdminCreateProductResponse> createProduct(AdminCreateProductRequest request) {
        ServiceResult<AdminCreateProductResponse> result = new ServiceResult<>();
        ProductEntity productEntity = adminCreateProductRequestToProductEntity(request);
        productEntityRepository.save(productEntity);

        AdminCreateProductResponse resultData = productEntityToAdminCreateProductResponse(productEntity);
        result.setStatus(ServiceResult.Status.SUCCESS);
        result.setMessage("Created new product");
        result.setData(resultData);
        return result;
    }

    private AdminCreateProductResponse productEntityToAdminCreateProductResponse(ProductEntity productEntity) {
        return new AdminCreateProductResponse(
                productEntity.getId(),
                productEntity.getName(),
                productEntity.getPrice(),
                productEntity.getQuantity(),
                productEntity.getDescription(),
                productEntity.getImage(),
                productEntity.getCatalogId(),
                productEntity.getUserId()
        );
    }

    private ProductEntity adminCreateProductRequestToProductEntity(AdminCreateProductRequest request) {
        ProductEntity productEntity = new ProductEntity();
        productEntity.setName(request.getName());
        productEntity.setPrice(request.getPrice());
        productEntity.setQuantity(request.getQuantity());
        productEntity.setDescription(request.getDescription());
        productEntity.setImage(request.getImage());
        productEntity.setCatalogId(request.getCatalogId());
        productEntity.setUserId(request.getUserId());
        return productEntity;
    }
}
