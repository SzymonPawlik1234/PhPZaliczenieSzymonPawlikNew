<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103201440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recenzje (id INT AUTO_INCREMENT NOT NULL, id_recenzji INT NOT NULL, id_produktu INT NOT NULL, ocena INT NOT NULL, opis_recenzji VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recenzje_table DROP FOREIGN KEY recenzje_table_ibfk_1');
        $this->addSql('DROP TABLE recenzje_table');
        $this->addSql('ALTER TABLE produkt_table ADD id_produktu INT NOT NULL, ADD �srednia_ocen INT DEFAULT NULL, DROP typ, DROP srednia_ocen, CHANGE cena cena VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recenzje_table (id INT AUTO_INCREMENT NOT NULL, id_produktu INT NOT NULL, ocena INT NOT NULL, opis_recenzji TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX idx_id_produktu (id_produktu), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE recenzje_table ADD CONSTRAINT recenzje_table_ibfk_1 FOREIGN KEY (id_produktu) REFERENCES produkt_table (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE recenzje');
        $this->addSql('ALTER TABLE produkt_table ADD typ VARCHAR(255) NOT NULL, ADD srednia_ocen NUMERIC(3, 2) DEFAULT NULL, DROP id_produktu, DROP �srednia_ocen, CHANGE cena cena NUMERIC(10, 2) NOT NULL');
    }
}
