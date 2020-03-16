<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\VgmApiController;

/**
 * @ApiResource(
 *     itemOperations={
 *     "get",
 *     "delete",
 *     "put"
 *     },
 *      collectionOperations={
 *          "post",
 *           "get",
 *          "change_password"={
 *              "method"="POST",
 *              "path"="/vgm/retrait/certificat",
 *              "controller"=VgmApiController::class,
 *              "normalization_context"={"groups"={"afup"}},
 *              "defaults"={"_api_receive"=false},
 *              "swagger_context"={
 *                  "summary" = "Change user password",
 *                  "parameters"={
 *                      {
 *                          "name" = "ticketNumber",
 *                          "in" = "body",
 *                          "schema" = {
 *                              "type" = "string"
 *                           },
 *                          "required" = "true",
 *                      }
 *                  },
 *              }
 *          }
 *      }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\VgmcertificatRepository")
 */
class Vgmcertificat
{



    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $requestTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $validationTime;

    /**
     * @ORM\Column(type="string", length=255,unique=true)
     */
    private $ticketNumber;

    /**
     * @ORM\Column(type="float", precision=10, scale=0)
     */
    private $netWeight;

    /**
     * @ORM\Column(type="float", precision=10, scale=0)
     */
    private $tareWeight;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $booking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $waybill;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $consignee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $containerNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cargoType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $containerSize;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sealNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $natureOfGoods;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $companyId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $agreementNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $certifyingOfficer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $validatingOfficer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $weighbridge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transporter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $driver;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $truckNumber;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tvfNumber;

    /**
     * @ORM\Column(type="date")
     */
    private $tvfDate;

    /**
     * @ORM\Column(type="date")
     */
    private $weightingDate1;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $weightingDate2;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isdelete  = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestTime(): ?\DateTimeInterface
    {
        return $this->requestTime;
    }

    public function setRequestTime(\DateTimeInterface $requestTime): self
    {
        $this->requestTime = $requestTime;

        return $this;
    }

    public function getValidationTime(): ?\DateTimeInterface
    {
        return $this->validationTime;
    }

    public function setValidationTime(\DateTimeInterface $validationTime): self
    {
        $this->validationTime = $validationTime;

        return $this;
    }

    public function getTicketNumber(): ?string
    {
        return $this->ticketNumber;
    }

    public function setTicketNumber(string $ticketNumber): self
    {
        $this->ticketNumber = $ticketNumber;

        return $this;
    }

    public function getNetWeight(): ?float
    {
        return $this->netWeight;
    }

    public function setNetWeight(string $netWeight): self
    {
        $this->netWeight = $netWeight;

        return $this;
    }

    public function getTareWeight(): ?float
    {
        return $this->tareWeight;
    }

    public function setTareWeight(string $tareWeight): self
    {
        $this->tareWeight = $tareWeight;

        return $this;
    }

    public function getBooking(): ?string
    {
        return $this->booking;
    }

    public function setBooking(string $booking): self
    {
        $this->booking = $booking;

        return $this;
    }

    public function getWaybill(): ?string
    {
        return $this->waybill;
    }

    public function setWaybill(string $waybill): self
    {
        $this->waybill = $waybill;

        return $this;
    }

    public function getConsignee(): ?string
    {
        return $this->consignee;
    }

    public function setConsignee(string $consignee): self
    {
        $this->consignee = $consignee;

        return $this;
    }

    public function getContainerNumber(): ?string
    {
        return $this->containerNumber;
    }

    public function setContainerNumber(string $containerNumber): self
    {
        $this->containerNumber = $containerNumber;

        return $this;
    }

    public function getCargoType(): ?string
    {
        return $this->cargoType;
    }

    public function setCargoType(string $cargoType): self
    {
        $this->cargoType = $cargoType;

        return $this;
    }

    public function getContainerSize(): ?string
    {
        return $this->containerSize;
    }

    public function setContainerSize(?string $containerSize): self
    {
        $this->containerSize = $containerSize;

        return $this;
    }

    public function getSealNumber(): ?string
    {
        return $this->sealNumber;
    }

    public function setSealNumber(string $sealNumber): self
    {
        $this->sealNumber = $sealNumber;

        return $this;
    }

    public function getNatureOfGoods(): ?string
    {
        return $this->natureOfGoods;
    }

    public function setNatureOfGoods(string $natureOfGoods): self
    {
        $this->natureOfGoods = $natureOfGoods;

        return $this;
    }

    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    public function setCompanyId(string $companyId): self
    {
        $this->companyId = $companyId;

        return $this;
    }

    public function getAgreementNumber(): ?string
    {
        return $this->agreementNumber;
    }

    public function setAgreementNumber(string $agreementNumber): self
    {
        $this->agreementNumber = $agreementNumber;

        return $this;
    }

    public function getCertifyingOfficer(): ?string
    {
        return $this->certifyingOfficer;
    }

    public function setCertifyingOfficer(?string $certifyingOfficer): self
    {
        $this->certifyingOfficer = $certifyingOfficer;

        return $this;
    }

    public function getValidatingOfficer(): ?string
    {
        return $this->validatingOfficer;
    }

    public function setValidatingOfficer(string $validatingOfficer): self
    {
        $this->validatingOfficer = $validatingOfficer;

        return $this;
    }

    public function getWeighbridge(): ?string
    {
        return $this->weighbridge;
    }

    public function setWeighbridge(string $weighbridge): self
    {
        $this->weighbridge = $weighbridge;

        return $this;
    }

    public function getTransporter(): ?string
    {
        return $this->transporter;
    }

    public function setTransporter(string $transporter): self
    {
        $this->transporter = $transporter;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getTruckNumber(): ?string
    {
        return $this->truckNumber;
    }

    public function setTruckNumber(string $truckNumber): self
    {
        $this->truckNumber = $truckNumber;

        return $this;
    }



    public function getTvfNumber(): ?string
    {
        return $this->tvfNumber;
    }

    public function setTvfNumber(string $tvfNumber): self
    {
        $this->tvfNumber = $tvfNumber;

        return $this;
    }

    public function getTvfDate(): ?\DateTimeInterface
    {
        return $this->tvfDate;
    }

    public function setTvfDate(\DateTimeInterface $tvfDate): self
    {
        $this->tvfDate = $tvfDate;

        return $this;
    }

    public function getWeightingDate1(): ?\DateTimeInterface
    {
        return $this->weightingDate1;
    }

    public function setWeightingDate1(\DateTimeInterface $weightingDate1): self
    {
        $this->weightingDate1 = $weightingDate1;

        return $this;
    }

    public function getWeightingDate2(): ?\DateTimeInterface
    {
        return $this->weightingDate2;
    }

    public function setWeightingDate2(?\DateTimeInterface $weightingDate2): self
    {
        $this->weightingDate2 = $weightingDate2;

        return $this;
    }

    public function getIsdelete(): ?bool
    {
        return $this->isdelete;
    }

    public function setIsdelete(?bool $isdelete): self
    {
        $this->isdelete = $isdelete;

        return $this;
    }
}
