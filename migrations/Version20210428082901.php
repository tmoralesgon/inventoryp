<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428082901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inv_inventory (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_4EDD32CFA76ED395 (user_id), INDEX IDX_4EDD32CFC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inv_item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, quantity INT NOT NULL, expiration DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inv_item_inv_inventory (inv_item_id INT NOT NULL, inv_inventory_id INT NOT NULL, INDEX IDX_672BF4E5F8CFB87 (inv_item_id), INDEX IDX_672BF4E5E9A0EE1B (inv_inventory_id), PRIMARY KEY(inv_item_id, inv_inventory_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inv_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inv_inventory ADD CONSTRAINT FK_4EDD32CFA76ED395 FOREIGN KEY (user_id) REFERENCES inv_user (id)');
        $this->addSql('ALTER TABLE inv_inventory ADD CONSTRAINT FK_4EDD32CFC54C8C93 FOREIGN KEY (type_id) REFERENCES inv_type (id)');
        $this->addSql('ALTER TABLE inv_item_inv_inventory ADD CONSTRAINT FK_672BF4E5F8CFB87 FOREIGN KEY (inv_item_id) REFERENCES inv_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inv_item_inv_inventory ADD CONSTRAINT FK_672BF4E5E9A0EE1B FOREIGN KEY (inv_inventory_id) REFERENCES inv_inventory (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inv_item_inv_inventory DROP FOREIGN KEY FK_672BF4E5E9A0EE1B');
        $this->addSql('ALTER TABLE inv_item_inv_inventory DROP FOREIGN KEY FK_672BF4E5F8CFB87');
        $this->addSql('ALTER TABLE inv_inventory DROP FOREIGN KEY FK_4EDD32CFC54C8C93');
        $this->addSql('DROP TABLE inv_inventory');
        $this->addSql('DROP TABLE inv_item');
        $this->addSql('DROP TABLE inv_item_inv_inventory');
        $this->addSql('DROP TABLE inv_type');
    }
}
