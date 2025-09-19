<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250919134635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bacon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger (id INT AUTO_INCREMENT NOT NULL, pain_id INT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(5, 2) NOT NULL, INDEX IDX_EFE35A0D64775A84 (pain_id), UNIQUE INDEX UNIQ_EFE35A0D3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_oignon (burger_id INT NOT NULL, oignon_id INT NOT NULL, INDEX IDX_A40C5A0417CE5090 (burger_id), INDEX IDX_A40C5A048F038184 (oignon_id), PRIMARY KEY(burger_id, oignon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_sauce (burger_id INT NOT NULL, sauce_id INT NOT NULL, INDEX IDX_F889AB0F17CE5090 (burger_id), INDEX IDX_F889AB0F7AB984B7 (sauce_id), PRIMARY KEY(burger_id, sauce_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_fromage (burger_id INT NOT NULL, fromage_id INT NOT NULL, INDEX IDX_ED0377FE17CE5090 (burger_id), INDEX IDX_ED0377FE7FCE0491 (fromage_id), PRIMARY KEY(burger_id, fromage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_salade (burger_id INT NOT NULL, salade_id INT NOT NULL, INDEX IDX_4813135A17CE5090 (burger_id), INDEX IDX_4813135A45927B6B (salade_id), PRIMARY KEY(burger_id, salade_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_viande (burger_id INT NOT NULL, viande_id INT NOT NULL, INDEX IDX_D19856C817CE5090 (burger_id), INDEX IDX_D19856C84C61F684 (viande_id), PRIMARY KEY(burger_id, viande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_poulet (burger_id INT NOT NULL, poulet_id INT NOT NULL, INDEX IDX_27D5456017CE5090 (burger_id), INDEX IDX_27D54560F2888615 (poulet_id), PRIMARY KEY(burger_id, poulet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_bacon (burger_id INT NOT NULL, bacon_id INT NOT NULL, INDEX IDX_86C55C7B17CE5090 (burger_id), INDEX IDX_86C55C7BDD63E84 (bacon_id), PRIMARY KEY(burger_id, bacon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_tomate (burger_id INT NOT NULL, tomate_id INT NOT NULL, INDEX IDX_1858E8B717CE5090 (burger_id), INDEX IDX_1858E8B7F2EE98A6 (tomate_id), PRIMARY KEY(burger_id, tomate_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_poisson (burger_id INT NOT NULL, poisson_id INT NOT NULL, INDEX IDX_296A3EDD17CE5090 (burger_id), INDEX IDX_296A3EDD5010D15C (poisson_id), PRIMARY KEY(burger_id, poisson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_oeuf (burger_id INT NOT NULL, oeuf_id INT NOT NULL, INDEX IDX_89C3A2EA17CE5090 (burger_id), INDEX IDX_89C3A2EAED4A6D9 (oeuf_id), PRIMARY KEY(burger_id, oeuf_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE burger_cornichon (burger_id INT NOT NULL, cornichon_id INT NOT NULL, INDEX IDX_D7964DB717CE5090 (burger_id), INDEX IDX_D7964DB749EE09AB (cornichon_id), PRIMARY KEY(burger_id, cornichon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, burger_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_67F068BC17CE5090 (burger_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cornichon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fromage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuf (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oignon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pain (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poisson (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poulet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sauce (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tomate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE viande (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0D64775A84 FOREIGN KEY (pain_id) REFERENCES pain (id)');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0D3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE burger_oignon ADD CONSTRAINT FK_A40C5A0417CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_oignon ADD CONSTRAINT FK_A40C5A048F038184 FOREIGN KEY (oignon_id) REFERENCES oignon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_sauce ADD CONSTRAINT FK_F889AB0F17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_sauce ADD CONSTRAINT FK_F889AB0F7AB984B7 FOREIGN KEY (sauce_id) REFERENCES sauce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_fromage ADD CONSTRAINT FK_ED0377FE17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_fromage ADD CONSTRAINT FK_ED0377FE7FCE0491 FOREIGN KEY (fromage_id) REFERENCES fromage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_salade ADD CONSTRAINT FK_4813135A17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_salade ADD CONSTRAINT FK_4813135A45927B6B FOREIGN KEY (salade_id) REFERENCES salade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_viande ADD CONSTRAINT FK_D19856C817CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_viande ADD CONSTRAINT FK_D19856C84C61F684 FOREIGN KEY (viande_id) REFERENCES viande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_poulet ADD CONSTRAINT FK_27D5456017CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_poulet ADD CONSTRAINT FK_27D54560F2888615 FOREIGN KEY (poulet_id) REFERENCES poulet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_bacon ADD CONSTRAINT FK_86C55C7B17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_bacon ADD CONSTRAINT FK_86C55C7BDD63E84 FOREIGN KEY (bacon_id) REFERENCES bacon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_tomate ADD CONSTRAINT FK_1858E8B717CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_tomate ADD CONSTRAINT FK_1858E8B7F2EE98A6 FOREIGN KEY (tomate_id) REFERENCES tomate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_poisson ADD CONSTRAINT FK_296A3EDD17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_poisson ADD CONSTRAINT FK_296A3EDD5010D15C FOREIGN KEY (poisson_id) REFERENCES poisson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_oeuf ADD CONSTRAINT FK_89C3A2EA17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_oeuf ADD CONSTRAINT FK_89C3A2EAED4A6D9 FOREIGN KEY (oeuf_id) REFERENCES oeuf (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_cornichon ADD CONSTRAINT FK_D7964DB717CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE burger_cornichon ADD CONSTRAINT FK_D7964DB749EE09AB FOREIGN KEY (cornichon_id) REFERENCES cornichon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0D64775A84');
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0D3DA5256D');
        $this->addSql('ALTER TABLE burger_oignon DROP FOREIGN KEY FK_A40C5A0417CE5090');
        $this->addSql('ALTER TABLE burger_oignon DROP FOREIGN KEY FK_A40C5A048F038184');
        $this->addSql('ALTER TABLE burger_sauce DROP FOREIGN KEY FK_F889AB0F17CE5090');
        $this->addSql('ALTER TABLE burger_sauce DROP FOREIGN KEY FK_F889AB0F7AB984B7');
        $this->addSql('ALTER TABLE burger_fromage DROP FOREIGN KEY FK_ED0377FE17CE5090');
        $this->addSql('ALTER TABLE burger_fromage DROP FOREIGN KEY FK_ED0377FE7FCE0491');
        $this->addSql('ALTER TABLE burger_salade DROP FOREIGN KEY FK_4813135A17CE5090');
        $this->addSql('ALTER TABLE burger_salade DROP FOREIGN KEY FK_4813135A45927B6B');
        $this->addSql('ALTER TABLE burger_viande DROP FOREIGN KEY FK_D19856C817CE5090');
        $this->addSql('ALTER TABLE burger_viande DROP FOREIGN KEY FK_D19856C84C61F684');
        $this->addSql('ALTER TABLE burger_poulet DROP FOREIGN KEY FK_27D5456017CE5090');
        $this->addSql('ALTER TABLE burger_poulet DROP FOREIGN KEY FK_27D54560F2888615');
        $this->addSql('ALTER TABLE burger_bacon DROP FOREIGN KEY FK_86C55C7B17CE5090');
        $this->addSql('ALTER TABLE burger_bacon DROP FOREIGN KEY FK_86C55C7BDD63E84');
        $this->addSql('ALTER TABLE burger_tomate DROP FOREIGN KEY FK_1858E8B717CE5090');
        $this->addSql('ALTER TABLE burger_tomate DROP FOREIGN KEY FK_1858E8B7F2EE98A6');
        $this->addSql('ALTER TABLE burger_poisson DROP FOREIGN KEY FK_296A3EDD17CE5090');
        $this->addSql('ALTER TABLE burger_poisson DROP FOREIGN KEY FK_296A3EDD5010D15C');
        $this->addSql('ALTER TABLE burger_oeuf DROP FOREIGN KEY FK_89C3A2EA17CE5090');
        $this->addSql('ALTER TABLE burger_oeuf DROP FOREIGN KEY FK_89C3A2EAED4A6D9');
        $this->addSql('ALTER TABLE burger_cornichon DROP FOREIGN KEY FK_D7964DB717CE5090');
        $this->addSql('ALTER TABLE burger_cornichon DROP FOREIGN KEY FK_D7964DB749EE09AB');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC17CE5090');
        $this->addSql('DROP TABLE bacon');
        $this->addSql('DROP TABLE burger');
        $this->addSql('DROP TABLE burger_oignon');
        $this->addSql('DROP TABLE burger_sauce');
        $this->addSql('DROP TABLE burger_fromage');
        $this->addSql('DROP TABLE burger_salade');
        $this->addSql('DROP TABLE burger_viande');
        $this->addSql('DROP TABLE burger_poulet');
        $this->addSql('DROP TABLE burger_bacon');
        $this->addSql('DROP TABLE burger_tomate');
        $this->addSql('DROP TABLE burger_poisson');
        $this->addSql('DROP TABLE burger_oeuf');
        $this->addSql('DROP TABLE burger_cornichon');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE cornichon');
        $this->addSql('DROP TABLE fromage');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE oeuf');
        $this->addSql('DROP TABLE oignon');
        $this->addSql('DROP TABLE pain');
        $this->addSql('DROP TABLE poisson');
        $this->addSql('DROP TABLE poulet');
        $this->addSql('DROP TABLE salade');
        $this->addSql('DROP TABLE sauce');
        $this->addSql('DROP TABLE tomate');
        $this->addSql('DROP TABLE viande');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
