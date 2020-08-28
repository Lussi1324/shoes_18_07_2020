<?php
namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\OfferDTO;
use App\Service\BrandServiceInterface;
use App\Service\OfferServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;
use App\Service\UserServiceInterface;
use App\Data\FullOfferDTO;
class OfferHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var BrandServiceInterface
     */
    private $brandService;

    /**
     * @var OfferServiceInterface
     */
    private $offerService;
    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                BrandServiceInterface $brandService,
                                OfferServiceInterface $offerService,
                                UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder);
        $this->brandService = $brandService;
        $this->offerService = $offerService;
        $this->userService=$userService;
    }

    /**
     * @param array $formData
     * @throws \Exception
     */
    public function add(array $formData = [])
    {
        if (isset($formData['add'])) {
                $this->handleAddProcess($formData);
        } else {
            $dto=$this->brandService->getAll();
            $user = $this->userService->currentUser();
            $this->render("offers/add", $dto);
        }
    }

    public function myOffers()
    {
        try {
            $offers =$this->offerService->getAllByAuthor();
            $this->render("users/profile",$offers);
        }catch (\Exception $ex){
            $offers = $this->offerService->getAllByAuthor();
            $this->render("users/profile",$offers,[$ex->getMessage()]);
        }
    }

    public function all()
    {
        $this->render("offers/all_shoes",$this->offerService->getAll());
    }


    private function handleAddProcess(array $formData)
    {
        try {
            $brand = $this->brandService->getOneById($formData['brand_id']);
            /** @var OfferDTO $dto */
            $dto = $this->dataBinder->bind($formData, OfferDTO::class);
            $dto->setBrands($brand);
            $dto->setUserId($_SESSION['id']);
            $this->offerService->create($dto);
            $this->redirect("shoes.php");
        } catch (\Exception $ex) {
            $dto = $this->brandService->getAll();
            $this->render("offers/add",$dto,
                [$ex->getMessage()]);
        }
    }
    /**
     * @param array $formData
     * @throws \Exception
     */
    public function edit(array $formData = [])
    {
        if (isset($formData['edit'])) {
            $this->handleEditProcess($formData);
        } else {
            $dto = $this->getEditDTO();
            $this->render("offers/edit", $dto);
        }
    }

    /**
     * @param array $formData
     * @throws \Exception
     */
    private function handleEditProcess(array $formData)
    {
        try {
            /** @var OfferDTO $dto */
            $dto = $this->dataBinder->bind($formData, OfferDTO::class);
            $dto->setId($_GET['id']);
            $dto->setUserId($_SESSION['id']);
            $brand = $this->brandService->getOneById($formData['brand_id']);
            $dto->setBrands($brand);
            $this->offerService->edit($dto, $_SESSION['id']);
            $this->redirect("profile.php");
        } catch (\Exception $ex) {
            $dto = $this->getEditDTO();
            $this->render("offers/edit", $dto,
                [$ex->getMessage()]);
        }
    }

    public function delete(array $queryData = [])
    {
        $this->offerService->delete($queryData['id'], $_SESSION['id']);
        $this->redirect('shoes.php');
    }

    public function view(array $queryData = [])
    {
        $offer= $this->offerService->getOne($queryData['id']);
        $this->render('offers/view', $offer);
    }

    /**
     * @return OfferDTO
     * @throws \Exception
     */
    private function getEditDTO():OfferDTO
    {
        $offer = $this->offerService->getOne($_GET['id']);
        $dto = new OfferDTO();
        $dto->setId($offer->getId());
        $dto->setName($offer->getName());
        $dto->setPrice($offer->getPrice());
        $dto->setImage($offer->getImage());
        $dto->setDescription($offer->getDescription());
        $dto->setUserId($offer->getUserId());
        $dto->setBrandId($offer->getBrandId());
        $dto->setBrands($this->brandService->getAll());
        return $dto;
    }
}