<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180414220504 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04ADD614C7E7');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, price_id, category_id, user_id, username, title, ingredients, description, brochure FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, price_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, username VARCHAR(255) NOT NULL COLLATE BINARY, title VARCHAR(255) NOT NULL COLLATE BINARY, ingredients VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, brochure VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_D34A04ADD614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product (id, price_id, category_id, user_id, username, title, ingredients, description, brochure) SELECT id, price_id, category_id, user_id, username, title, ingredients, description, brochure FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADD614C7E7 ON product (price_id)');
        $this->addSql('DROP INDEX IDX_794381C64584665A');
        $this->addSql('DROP INDEX IDX_794381C6A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__review AS SELECT id, user_id, product_id, rating, price_paid, username, place_purchased, description FROM review');
        $this->addSql('DROP TABLE review');
        $this->addSql('CREATE TABLE review (id INTEGER NOT NULL, user_id INTEGER DEFAULT NULL, product_id INTEGER DEFAULT NULL, rating DOUBLE PRECISION NOT NULL, price_paid DOUBLE PRECISION NOT NULL, username VARCHAR(255) NOT NULL COLLATE BINARY, place_purchased VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_794381C6A76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_794381C64584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO review (id, user_id, product_id, rating, price_paid, username, place_purchased, description) SELECT id, user_id, product_id, rating, price_paid, username, place_purchased, description FROM __temp__review');
        $this->addSql('DROP TABLE __temp__review');
        $this->addSql('CREATE INDEX IDX_794381C64584665A ON review (product_id)');
        $this->addSql('CREATE INDEX IDX_794381C6A76ED395 ON review (user_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_D34A04ADD614C7E7');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, price_id, category_id, user_id, username, title, ingredients, description, brochure FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, price_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, username VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, ingredients VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, brochure VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product (id, price_id, category_id, user_id, username, title, ingredients, description, brochure) SELECT id, price_id, category_id, user_id, username, title, ingredients, description, brochure FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04ADD614C7E7 ON product (price_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('DROP INDEX IDX_794381C6A76ED395');
        $this->addSql('DROP INDEX IDX_794381C64584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__review AS SELECT id, user_id, product_id, rating, price_paid, username, place_purchased, description FROM review');
        $this->addSql('DROP TABLE review');
        $this->addSql('CREATE TABLE review (id INTEGER NOT NULL, user_id INTEGER DEFAULT NULL, product_id INTEGER DEFAULT NULL, rating DOUBLE PRECISION NOT NULL, price_paid DOUBLE PRECISION NOT NULL, username VARCHAR(255) NOT NULL, place_purchased VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO review (id, user_id, product_id, rating, price_paid, username, place_purchased, description) SELECT id, user_id, product_id, rating, price_paid, username, place_purchased, description FROM __temp__review');
        $this->addSql('DROP TABLE __temp__review');
        $this->addSql('CREATE INDEX IDX_794381C6A76ED395 ON review (user_id)');
        $this->addSql('CREATE INDEX IDX_794381C64584665A ON review (product_id)');
    }
}
