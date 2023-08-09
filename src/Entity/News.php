<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $news_title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $news_start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $news_end_date = null;

    #[ORM\OneToOne(inversedBy: 'news', targetEntity: Organization::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\Column(type: Types::INTEGER, nullable: false)]
    private Organization $organization_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsTitle(): ?string
    {
        return $this->news_title;
    }

    public function setNewsTitle(string $news_title): static
    {
        $this->news_title = $news_title;

        return $this;
    }

    public function getNewsStartDate(): ?\DateTimeInterface
    {
        return $this->news_start_date;
    }

    public function setNewsStartDate(\DateTimeInterface $news_start_date): static
    {
        $this->news_start_date = $news_start_date;

        return $this;
    }

    public function getNewsEndDate(): ?\DateTimeInterface
    {
        return $this->news_end_date;
    }

    public function setNewsEndDate(\DateTimeInterface $news_end_date): static
    {
        $this->news_end_date = $news_end_date;

        return $this;
    }

    public function getOrganizationId(): Organization
    {
        return $this->organization_id;
    }

    public function setOrganizationId(Organization $organization_id): static
    {
        $this->organization_id = $organization_id;

        return $this;
    }
}
