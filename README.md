# Count Orders To Get Discount - Módulo Magento 2
🇧🇷 **Português** | 🇺🇸 **English**


Módulo Magento 2 que gera automaticamente cupons de desconto para clientes com base na quantidade de pedidos concluídos.

🇧🇷 **Funcionalidades**

Geração automática de cupons após X pedidos finalizados
Integração com SalesRule do Magento
Armazenamento dos cupons em tabela customizada
Exibição de cupons apenas para clientes logados
Aviso global para o cliente quando algum cupom estiver disponivel para ele

🇧🇷 **Utilização**

Copie o módulo para app/code/Moreira/CountOrdersToGetDiscount

Rode os seguintes comandos

bin/magento module:enable Moreira_CountOrdersToGetDiscount

bin/magento setup:upgrade

bin/magento setup:di:compile

Acesse o painel do Magento

Vá em:

Stores -> Configuration -> Sales -> Order Discount

Preenche as configurações do módulo

🇧🇷 **Objetivo:**

Este módulo foi desenvolvido como projeto de portfólio para demonstrar conhecimentos avançados em Magento 2, incluindo observers, models customizados, integração com frontend e regras de negócio reais

🇺🇸 **Description**

Magento 2 module that automatically generates discount coupons for customers based on the number of completed orders.

🇺🇸 **Features**

Automatic coupon generation after completed orders
Integration with Magento SalesRule
Coupons stored in a custom database table
Coupons displayed only for logged-in customers
Global notification informing customers when a coupon is available

🇺🇸 **Usage**

Copy the module to:
app/code/Moreira/CountOrdersToGetDiscount

Run the following commands

bin/magento module:enable Moreira_CountOrdersToGetDiscount

bin/magento setup:upgrade

bin/magento setup:di:compile

Access the Magento Admin Panel

Go to:

Stores -> Configuration -> Sales -> Order Discount

Configure the module settings according to your business rules

🇺🇸 **Purpose**

This module was developed as portfolio project to demonstrate advanced Magento 2 skills, including:

Observers

Custom models and repositories

Frontend integration

Real-world business implementation
