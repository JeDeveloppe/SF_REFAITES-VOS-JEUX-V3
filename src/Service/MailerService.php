<?php

namespace App\Service;

use Fpdf\Fpdf;
use DateInterval;
use DateTimeImmutable;
use App\Entity\Document;
use App\Entity\DocumentLignes;
use App\Repository\UserRepository;
use App\Repository\PanierRepository;
use App\Repository\DocumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\MethodeEnvoiRepository;
use App\Repository\DocumentLignesRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use App\Repository\InformationsLegalesRepository;

class MailerService
{

    private $mailer;


    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmailWithTemplate($destinataire, $from, $sujet, $template, $parametres)
    {
        $email = (new TemplatedEmail())
            ->from($from)
            ->to($destinataire)
            ->replyTo($from)
            ->subject($sujet)
            ->htmlTemplate('email/devis_disponible.html.twig')
            ->context($parametres);
    
        $this->mailer->send($email);

    }

    public function sendEmailContact($destinataire, $from, $sujet, $parametres)
    {
        $email = (new TemplatedEmail())
            ->from($from)
            ->to($destinataire)
            ->replyTo($from)
            ->subject($sujet)
            ->htmlTemplate('email/contact.html.twig')
            ->context($parametres);

        $this->mailer->send($email);

    }
}