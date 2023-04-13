package com.gmech.quotation.service;

import java.math.BigDecimal;

import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.gmech.quotation.quotation.QuotationRepository;
import com.gmech.quotation.quotation.QuotationRequest;
import com.gmech.quotation.quotation.QuotationResponse;
import com.gmech.quotation.quotation.Quotation;

import lombok.RequiredArgsConstructor;

@Service
@RequiredArgsConstructor
public class QuotationService {

    private final QuotationRepository repository;

    @Autowired
    private final ModelMapper modelMapper;

    public QuotationResponse create(QuotationRequest request) {
        var quotation = Quotation.builder()
            .customerId(request.getCustomerId())
            .vehicleId(request.getVehicleId())
            .costs(request.getCosts())
            .parts(request.getParts())
            .combinedCosts(
                request.getCosts().stream().mapToInt(Integer::valueOf).sum() 
                    + 
                request.getParts().stream().mapToInt(np -> np.getNetPrice() * np.getQuantity()).sum())
            .build();

        return this.modelMapper.map(
            repository.save(quotation), 
            QuotationResponse.class);
    }
}
