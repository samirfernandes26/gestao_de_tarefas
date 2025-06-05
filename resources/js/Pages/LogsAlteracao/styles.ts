// resources/js/Pages/LogsAlteracao/styles.tsx
import styled from 'styled-components';

export const PageContainer = styled.div`
    padding: 3rem;
    min-height: 100vh;
    background: linear-gradient(120deg, #05060a, #1f2937);
    color: #e5e7eb;
    font-family: 'Orbitron', 'Inter', sans-serif;
`;

export const Header = styled.header`
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;

    h1 {
        font-size: 2.2rem;
        color: #93c5fd;
        text-shadow: 0 0 6px #3b82f6;
    }
`;

export const Table = styled.table`
    width: 100%;
    background: rgba(31, 41, 55, 0.95);
    backdrop-filter: blur(8px);
    border-radius: 12px;
    border-collapse: collapse;
    box-shadow: 0 0 35px rgba(0, 0, 0, 0.3);
`;

export const Thead = styled.thead`
    background: rgba(255, 255, 255, 0.05);

    th {
        padding: 1rem;
        text-align: left;
        color: #60a5fa;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.06rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }
`;

export const Tbody = styled.tbody`
    td {
        padding: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.03);
        color: #d1d5db;
        vertical-align: top;
    }

    tr:hover {
        background: rgba(255, 255, 255, 0.025);
    }

    a {
        color: #8b5cf6;
        font-weight: bold;

        &:hover {
            color: #3cf2ff;
        }
    }
`;
