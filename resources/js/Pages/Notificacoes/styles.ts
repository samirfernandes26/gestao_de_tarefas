// resources/js/Pages/Notificacoes/styles.tsx
import styled from 'styled-components';

export const PageContainer = styled.div`
    padding: 3rem;
    min-height: 100vh;
    background: linear-gradient(120deg, #0a0a0f, #111827);
    color: #f1f5f9;
    font-family: 'Orbitron', 'Inter', sans-serif;
`;

export const Header = styled.header`
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;

    h1 {
        font-size: 2.2rem;
        color: #7dd3fc;
        text-shadow: 0 0 8px #38bdf8;
    }
`;

export const Table = styled.table`
    width: 100%;
    background: rgba(17, 24, 39, 0.95);
    border-collapse: collapse;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 0 35px rgba(0, 0, 0, 0.4);
`;

export const Thead = styled.thead`
    background: rgba(255, 255, 255, 0.05);

    th {
        padding: 1rem;
        text-align: left;
        color: #60a5fa;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }
`;

export const Tbody = styled.tbody`
    td {
        padding: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.03);
        color: #e2e8f0;
        vertical-align: top;
    }

    tr.unread {
        background-color: rgba(255, 255, 255, 0.025);
    }

    button {
        background: transparent;
        border: none;
        color: #38bdf8;
        font-weight: bold;
        cursor: pointer;
        margin-right: 1rem;

        &:hover {
            color: #0ea5e9;
        }

        &.danger {
            color: #f87171;

            &:hover {
                color: #ef4444;
            }
        }
    }
`;
